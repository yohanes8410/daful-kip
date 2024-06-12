<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function login()
    {
        return redirect('/dashboard');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required|max:11',
            'password' => 'required'
        ]);

        // $infologin = [
        //     'nim' =>$request->email,
        //     'password' =>$request->password,
        // ];

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            } elseif (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            $request->session()->regenerate();
            return redirect()->intended('/dashboard-mahasiswa');
        }

        return back()->with('loginError', 'Periksa kembali Username/NIM dan password Anda !');

        if (Auth::user()->is_active === false) {
            return back()->with('loginGagal', 'Akun Anda belum dikonfirmasi admin !');
        };
    }



    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/dashboard');
    }

    public function register()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view(
            'register.index',
            [

                'skemas' => Skema::all(),
                'fakultass' => Fakultas::all(),
                'prodis' => Prodi::all()
            ],
            compact('fakultas', 'prodi')
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|min:11|unique:users',
            'email' => ['required', 'email', 'unique:users', function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@student.untan.ac.id')) {
                    $fail('Email harus menggunakan domain @student.untan.ac.id.');
                }
            }],
            'skema_id' => 'required',
            'fakultas_id' => 'required',
            'prodi_id' => 'required',
            'password' => 'required|min:5|max:255'
        ]);

        // $user = new User();
        // $user->nama = $validatedData['nama'];
        // $user->nim = $validatedData['nim'];
        // $user->email = $validatedData['email'];
        // $user->skema_id = $validatedData['skema_id'];
        // $user->fakultas_id = $validatedData['fakultas_id'];
        // $user->prodi_id = $validatedData['prodi_id'];
        // $user->password = bcrypt($validatedData['password']);
        // $user->role = 'mahasiswa'; // Set default role to 'mahasiswa'
        // $user->is_active = false;  // Set default active status to false
        // $user->save();
        User::create($validatedData);
        // dd($validatedData);
        return redirect('/dashboard')->with('success', 'Tunggu beberapa saat untuk proses konfirmasi akun.');
    }

    public function getFakultasByProdi($prodiId)
    {
        $prodi = Prodi::with('fakultas')->find($prodiId);
        if ($prodi) {
            return response()->json(['fakultas' => $prodi->fakultas]);
        } else {
            return response()->json(['message' => 'Prodi not found'], 404);
        }
    }
}
