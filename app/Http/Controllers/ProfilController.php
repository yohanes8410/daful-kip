<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fakultas;
use App\Models\Prodi;

class ProfilController extends Controller
{

    // public function index()
    // {
    // return view('mahasiswa.profilMhs', [
    //     "user" => User::all()
    // ]);
    // }


    public function index()
    {
        $user = auth()->user();
        $isProfileComplete = $this->isProfileComplete($user);

        return view('mahasiswa.profilMhs', ['users' => $user, 'isProfileComplete' => $isProfileComplete]);
    }

    public function edit()
    {
        $user = auth()->user();
        $isProfileComplete = $this->isProfileComplete($user);
        $fakultas = Fakultas::with('prodi')->get();

        return view(
            'mahasiswa.editProfilMhs',
            [
                'users' => $user,
                'fakultass' => Fakultas::all(),
                'prodis' => Prodi::all(),
                'angkatans' => Angkatan::all(),
                'isProfileComplete' => $isProfileComplete
            ],
            compact('fakultas')
        );
    }

    private function isProfileComplete($user)
    {
        return $user->nama && $user->nim && $user->skema && $user->fakultas && $user->no_mhs && $user->angkatan && $user->prodi && $user->no_ortu && $user->jenis_kelamin && $user->email && $user->alamat;
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|max:255',
            'skema' => 'required',
            'jenis_kelamin' => 'required',
            'email' => ['required', 'email', function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@student.untan.ac.id')) {
                    $fail('Email harus menggunakan domain @student.untan.ac.id.');
                }
            }],
            'fakultas_id' => 'required',
            'prodi_id' => 'required',
            'angkatan_id' => 'required',
            'alamat' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) < 5) {
                    $fail($attribute . ' harus berisi setidaknya 5 kata.');
                }
            }],
        ];

        if ($request->nim != $user->nim) {
            $rules['nim'] = 'required|min:11|unique:users';
        }
        if ($request->no_mhs != $user->no_mhs) {
            $rules['no_mhs'] = 'required|min:8|max:13|unique:users';
        }
        if ($request->no_ortu != $user->no_ortu) {
            $rules['no_ortu'] = 'required|min:8|max:13|unique:users';
        }

        $validatedData = $request->validate($rules);

        // Tambahkan awalan "+62" pada nomor telepon
        // $validatedData['no_mhs'] = '+62' . ltrim($request->no_mhs, '0');
        // $validatedData['no_ortu'] = '+62' . ltrim($request->no_ortu, '0');

        // Update user data
        $user->update($validatedData);

        return redirect()->route('mahasiswa.profil')->with('success_update', 'Data profil Anda telah diperbaharui!');
    }
}