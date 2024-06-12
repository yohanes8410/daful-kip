<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Fakultas;
use App\Models\Form;
use App\Models\Jawaban;
use App\Models\Status;
use App\Models\User;
use App\Models\Response;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skema_id = session('skema_id');
        $angkatan_id = session('angkatan_id');
        $fakultas_id = session('fakultas_id');


        $fakultas = Fakultas::find($fakultas_id);
        $angkatan = Angkatan::find($angkatan_id);
        $users = User::where('skema_id', $skema_id)
            ->where('angkatan_id', $angkatan_id)
            ->where('fakultas_id', $fakultas_id)
            ->orderBy('nim', 'asc')
            ->get();

        $total_users = $users->count();

        return view('admin.getMahasiswa', compact('users', 'fakultas', 'angkatan', 'total_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function detail($id)
    {
        $user = User::findOrFail($id);
        return view('admin.detail-mahasiswa', compact('user'));
    }

    public function diberhentikan($id, Request $request)
    {
        $request->validate([
            'periode_id' => 'required',
            'alasan' => 'required'
        ]);

        $user = User::findOrFail($id);
        $diberhentikanStatus = Status::where('nama', 'Diberhentikan')->first();

        if ($diberhentikanStatus) {
            $user->status_id = $diberhentikanStatus->id;
            $user->save();
        }



        $user->periode_id = $request->periode_id;
        $user->alasan = $request->alasan;
        $user->save();

        return back()->with('diberhentikan', 'User diberhentikan.');
    }

    public function alumni($id, Request $request)
    {
        $request->validate([
            'periode_id' => 'required'
        ]);

        $user = User::findOrFail($id);
        $alumniStatus = Status::where('nama', 'Alumni')->first();

        if ($alumniStatus) {
            $user->status_id = $alumniStatus->id;
            $user->save();
        }

        $user->periode_id = $request->periode_id;
        $user->save();
        return back()->with('alumni', 'User diubah menjadi alumni.');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('delete-user', 'User dihapus.');
    }

    // Metode untuk memeriksa kelengkapan profil pengguna
    private function isProfileComplete($user)
    {
        return $user->nama && $user->nim && $user->skema && $user->fakultas && $user->no_mhs && $user->angkatan && $user->prodi && $user->no_ortu && $user->jenis_kelamin && $user->email && $user->alamat;
    }

    public function indexForm()
    {
        $users = User::where('id', auth()->user()->id)->first();
        $user = auth()->user();
        $isProfileComplete = $this->isProfileComplete($user);
        $forms = Form::all()->map(function ($form) use ($user) {
            $form->is_filled = $user->jawabans()->whereHas('pertanyaan', function ($query) use ($form) {
                $query->where('form_id', $form->id);
            })->exists();
            return $form;
        });

        // Hitung jumlah formulir yang belum diisi
        $unfilledFormCount = $forms->where('is_filled', false)->count();

        return view('mahasiswa.forms.index', compact('forms', 'user', 'unfilledFormCount', 'users'),  ['users' => $user, 'isProfileComplete' => $isProfileComplete]);
    }

    public function showForm(Form $form)
    {
        $users = User::where('id', auth()->user()->id)->first();
        $form->load('pertanyaans.options');
        $user = auth()->user();
        $isProfileComplete = $this->isProfileComplete($user);

        // Ambil jawaban yang sudah ada
        $existingAnswers = Jawaban::where('user_id', $user->id)
            ->whereIn('pertanyaan_id', $form->pertanyaans->pluck('id'))
            ->get()
            ->keyBy('pertanyaan_id');

        return view('mahasiswa.forms.show', compact('form', 'user', 'existingAnswers', 'users'), ['users' => $user, 'isProfileComplete' => $isProfileComplete]);
    }

    public function submitForm(Request $request, Form $form, GoogleDriveService $googleDriveService)
    {

        $request->validate([
            'jawabans' => 'required|array',
            'jawabans.*' => 'required',
        ]);

        $user = auth()->user();

        foreach ($request->jawabans as $pertanyaanId => $jawaban) {
            // Handle file upload
            if ($request->hasFile("jawabans.$pertanyaanId")) {
                $file = $request->file("jawabans.$pertanyaanId");
                $filePath = $file->getPathName();
                $fileName = $file->getClientOriginalName();
                $fileId = $googleDriveService->uploadFile($filePath, $fileName);
                $fileUrl = $googleDriveService->getFileUrl($fileId);

                Jawaban::updateOrCreate(
                    [
                        'pertanyaan_id' => $pertanyaanId,
                        'user_id' => $user->id,
                    ],
                    [
                        'jawaban' => $fileUrl, // Save the file URL to the database
                    ]
                );
            } else {
                // Handle non-file input
                $jawabanData = is_array($jawaban) ? json_encode($jawaban) : $jawaban;

                Jawaban::updateOrCreate(
                    [
                        'pertanyaan_id' => $pertanyaanId,
                        'user_id' => $user->id,
                    ],
                    [
                        'jawaban' => $jawabanData,
                    ]
                );
            }
        }

        return redirect()->route('mahasiswa.forms')->with('success', 'Jawaban berhasil disimpan!');
    }
}
