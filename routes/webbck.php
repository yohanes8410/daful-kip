<?php

use App\Models\Prodi;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardmhsController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});



Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('store');
});



Route::controller(ProfilController::class)->group(function () {
    Route::get('/dashboard-mahasiswa', 'index')->name('mahasiswa.dashboard')->middleware('isUser');
    Route::get('/profil-mahasiswa', 'index')->name('mahasiswa.profil')->middleware('auth');
    Route::get('/edit-profil-mahasiswa', 'edit')->name('mahasiswa.edit')->middleware('auth');
    Route::put('/edit-profil-mahasiswa/{user}', 'update')->name('mahasiswa.update');
});

// Route::get('/get-fakultas/{prodi}', function ($prodi) {
//     $prodi = Prodi::find($prodi);
//     return response()->json(['fakultas' => $prodi->fakultas->nama]);
// });


// Route::get('/get-fakultas/{prodi}', function ($prodi) {
//     $prodi = Prodi::with('fakultas')->find($prodi);
//     return response()->json(['fakultas' => ['id' => $prodi->fakultas->id, 'nama' => $prodi->fakultas->nama]]);
// });

Route::get('/get-fakultas-by-prodi/{prodi}', [LoginController::class, 'getFakultasByProdi']);



// Route::get('/prodis/{fakultas_id}', [ProfilController::class, 'getProdis']);
// Route::get('/dashboard-mahasiswa', function() {
//     return view('mahasiswa.profilMhs');
// })->middleware('auth');

Route::get('/dashboardAdmin', function () {
    return view('admin.dashboardAdmin.index');
})->name('admin.dashboard')->middleware('auth');


// MAHASISWA


// Route::post('/edit-profil-mahasiswa', [ProfilController::class, 'update']);

// Route::get('/profil-mahasiswa', function () {
//     return view('mahasiswa.profilMhs');
// });



Route::get('/daful-mahasiswa', function () {
    return view('mahasiswa.dafulMhs');
})->name('mahasiswa.daful');




// ADMIN


Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard-admin', 'index')->name('admin.dashboard')->middleware('isAdmin');
    Route::get('/halaman-utama', 'index')->name('admin.dashboard')->middleware('isAdmin');

    Route::get('/profil-mahasiswa-diberhentikan-admin', 'aktif')->name('admin.profil-mhs-diberhentikan')->middleware('auth');
    Route::get('/profil-mahasiswa-alumni-admin', 'aktif')->name('admin.profil-mhs-alumi')->middleware('auth');

    Route::get('/pesan-otomatis', 'index')->name('admin.pesan-otomatis')->middleware('auth');
    Route::get('/konfirmasi-akun', 'index')->name('admin.konfirmasi-akun')->middleware('auth');
    Route::get('/daful-mahasiswa-admin', 'index')->name('admin.daful-mhs')->middleware('auth');
});

Route::controller(SkemaController::class)->group(function () {
    Route::get('/profil-mahasiswa-aktif-admin{status_id}', 'show')->name('show.skema');
    Route::get('/store-profil-mahasiswa-aktif-admin/{skema_id}', 'store')->name('store.skema');
});

Route::controller(AngkatanController::class)->group(function () {
    Route::get('/profil-mahasiswa-aktif-admin/angkatan', 'show')->name('show.angkatan');
    Route::get('/store-profil-mahasiswa-aktif-admin/angkatan/{angkatan_id}', 'store')->name('store.angkatan');
    Route::post('profil-mahasiswa-aktif-admin/angkatan/tambah', 'create')->name('tambah_admin.profil-mahasiswa-angkatan');
    Route::get('profil-mahasiswa-aktif-admin/angkatan/hapus/{id_angkatan}', 'destroy')->name('hapus_admin.profil-mahasiswa-angkatan');
});

Route::controller(FakultasController::class)->group(function () {
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas', 'show')->name('show.fakultas');
    Route::get('store-profil-mahasiswa-aktif-admin/angkatan/fakultas/{fakultas_id}', 'store')->name('store.fakultas');
    Route::post('profil-mahasiswa-aktif-admin/angkatan/fakultas/tambah', 'create')->name('tambah_admin.profil-mahasiswa-fakultas');
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/hapus{id_fakultas}', 'destroy')->name('hapus_admin.profil-mahasiswa-fakultas');
});

Route::controller(MahasiswaController::class)->group(function () {
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/mahasiswa', 'index')->name('index.mahasiswa');

    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/mahasiswa/{id}/detail', 'detail')->name('detail.mahasiswa');
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/mahasiswa/{id}/diberhentikan', 'diberhentikan')->name('diberhentikan.mahasiswa');
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/mahasiswa/{id}/alumni', 'alumni')->name('alumni.mahasiswa');
    Route::delete('profil-mahasiswa-aktif-admin/angkatan/fakultas/mahasiswa/{id}/hapus', 'hapus')->name('hapus.mahasiswa');
});




// Route::get('/dashboard-admin', function () {
//     return view('admin.halamanUtama');
// })->name('admin.dashboard');

// Route::get('/halaman-utama', function () {
//     return view('admin.halamanUtama');
// });

// Route::get('/profil-mahasiswa-admin', function () {
//     return view('admin.profilMhsAdmin');
// });
// A
// Route::get('/pesan-otomatis', function () {
//     return view('admin.pesanOtomatis');
// });

// Route::get('/konfirmasi-akun', function () {
//     return view('admin.KonfirmasiAkun');
// });

// Route::get('/daful-mahasiswa-admin', function () {
//     return view('admin.dafulMhsAdmin');
// });