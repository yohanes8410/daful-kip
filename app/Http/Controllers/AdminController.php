<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Form;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $diberhentikan = User::where('status_id', '2');
        $alumni = User::where('status_id', '3');
        $users = User::all();
        $total_users = $users->count();
        $total_users_diberhentikan = $diberhentikan->count();
        $total_alumni = $alumni->count();
        $total_users_aktif = User::where('role', 'mahasiswa')->where('is_active', true)->count();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.halamanUtama', compact('users', 'total_users', 'total_users_diberhentikan', 'total_alumni', 'total_users_konfirmasi', 'total_users_aktif'));
    }

    public function aktif()
    {
        return view(
            'admin.profilMhsAdmin',
            [
                'skemas' => Skema::all()
            ]
        );
    }

    public function show()
    {
    }

    public function diberhentikan()
    {
        return view('admin.profilMhsAdmin');
    }

    public function alumni()
    {
        return view('admin.profilMhsAdmin');
    }

    public function detail($id)
    {
        $user = User::find($id);
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.detail-mahasiswa-konfirmasi', compact('user', 'total_users_konfirmasi'));
    }

    public function konfirmasi(Request $request)
    {
        $search = $request->input('search');
        $usersQuery = User::where('is_active', false);

        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhereHas('prodi', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        $users = $usersQuery->orderBy('nim', 'asc')->paginate(10);
        // $users = User::where('role', 'mahasiswa')->where('is_active', false)->orderBy('nim', 'asc')->paginate(10);
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.konfirmasiAkun', compact('users', 'total_users_konfirmasi'));
    }

    public function kontak()
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $total_users = User::count();
        $users = User::where('role', 'mahasiswa')->orderBy('nim', 'asc')->paginate(10);
        return view('admin.kontak', compact('total_users_konfirmasi', 'total_users', 'users'));
    }

    public function pesanOtomatis()
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.pesanOtomatis', compact('total_users_konfirmasi'));
    }

    public function aktivasi($id)
    {
        $user = User::find($id);
        if ($user && $user->role == 'mahasiswa') {
            $user->is_active = true;
            $user->save();
        }
        return back()->with('success-activate', 'Akun berhasil diaktifkan.');
    }

    public function aktivasiSemua()
    {
        User::where('role', 'mahasiswa')->where('is_active', false)->update(['is_active' => true]);
        return back()->with('success-all-activate', 'Seluruh akun telah berhasil diaktifkan.');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('hapus-akun', 'Data akun berhasil dihapus.');
    }

    // FORM
    public function indexForm()
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $forms = Form::all();
        return view('admin.forms.index', compact('total_users_konfirmasi', 'forms'));
    }

    public function createForm()
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.forms.create', compact('total_users_konfirmasi'));
    }

    public function storeForm(Request $request)
    {

        $form = Form::create($request->only('nama', 'deskripsi'));


        foreach ($request->pertanyaans as $pertanyaanData) {
            $pertanyaan = new Pertanyaan([
                'tipe' => $pertanyaanData['tipe'],
                'pertanyaan' => $pertanyaanData['pertanyaan'],
            ]);
            $form->pertanyaans()->save($pertanyaan);

            if (in_array($pertanyaanData['tipe'], ['multiple_choice', 'checkbox'])) {
                foreach ($pertanyaanData['options'] as $option) {
                    $pertanyaan->options()->create(['option' => $option]);
                }
            }
        }

        // foreach ($request->pertanyaans as $pertanyaan) {
        //     $form->pertanyaans()->create($pertanyaan);
        // }

        return redirect()->route('admin.forms')->with('success_add_form', 'Formulir berhasil ditambahkan.');
    }

    public function editForm(Form $form)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.forms.edit', compact('form', 'total_users_konfirmasi'));
    }

    public function updateForm(Request $request, Form $form)
    {

        $form->update($request->only('nama', 'deskripsi'));
        $form->pertanyaans()->delete();


        foreach ($request->pertanyaans as $pertanyaanData) {
            $pertanyaan = new Pertanyaan([
                'tipe' => $pertanyaanData['tipe'],
                'pertanyaan' => $pertanyaanData['pertanyaan'],
            ]);
            $form->pertanyaans()->save($pertanyaan);

            if (in_array($pertanyaanData['tipe'], ['multiple_choice', 'checkbox'])) {
                foreach ($pertanyaanData['options'] as $option) {
                    $pertanyaan->options()->create(['option' => $option]);
                }
            }
        }


        // foreach ($request->pertanyaans as $pertanyaan) {
        //     $form->pertanyaans()->create($pertanyaan);
        // }

        return redirect()->route('admin.forms', 'total_users_konfirmasi')->with('success', 'Form updated successfully.');
    }

    public function destroyForm(Form $form)
    {
        $form->delete();
        return redirect()->route('admin.forms');
    }

    public function responsesForm(Form $form)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();

        // Dapatkan pertanyaan yang terkait dengan formulir dan kemudian ambil jawaban terkait
        $pertanyaanIds = $form->pertanyaans()->pluck('id');
        $jawabanUsers = Jawaban::whereIn('pertanyaan_id', $pertanyaanIds)->with('user')->get()->groupBy('user_id');

        return view('admin.forms.responses', compact('jawabanUsers', 'total_users_konfirmasi', 'form'));
    }

    public function selectAngkatan(Form $form)
    {
        $angkatans = Angkatan::all();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.forms.select_angkatan', compact('angkatans', 'form', 'total_users_konfirmasi'));
    }

    // Tampilkan respons berdasarkan angkatan yang dipilih
    public function userResponsesByAngkatan(Form $form, Angkatan $angkatan)
    {
        $users = User::where('angkatan_id', $angkatan->id)->get();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.forms.user_responses_by_angkatan', compact('users', 'total_users_konfirmasi', 'form', 'angkatan'));
    }

    public function userResponses(Form $form, User $user)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $responses = Jawaban::where('user_id', $user->id)->whereHas('pertanyaan', function ($query) use ($form) {
            $query->where('form_id', $form->id);
        })->get();

        return view('admin.forms.user_responses', compact('responses', 'form', 'user', 'total_users_konfirmasi'));
    }
}
