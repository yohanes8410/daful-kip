<?php

use App\Models\Prodi;
use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardmhsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MhsaktifController;
use App\Http\Controllers\MhspasifController;
use App\Http\Controllers\PeriodeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\ReminderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/export-mahasiswa-aktif/{status_id}/{skema_id}/{angkatan_id}/{fakultas_id}', [ExportController::class, 'export'])->name('export.mahasiswa-aktif');




Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('store');
});



Route::controller(ProfilController::class)->group(function () {
    Route::get('/dashboard-mahasiswa', 'index')->name('mahasiswa.dashboard')->middleware('is_active');
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


// Rute Mahasiswa Aktif
Route::controller(MhsaktifController::class)->group(function () {
    Route::get('show-skema-aktif/{status_id}', 'showSkema')->name('show.skema-aktif');
    Route::get('show-angkatan/{status_id}/{skema_id}', 'showAngkatan')->name('show.angkatan');
    Route::get('show-fakultas/{status_id}/{skema_id}/{angkatan_id}', 'showFakultas')->name('show.fakultas');
    Route::get('info-users/{status_id}/{skema_id}/{angkatan_id}/{fakultas_id}', 'viewUsers')->name('info.users');
    Route::get('detail-user/{status_id}/{skema_id}/{angkatan_id}/{fakultas_id}/{user_id}', 'detailUser')->name('detail.user');
});

// Rute Mahasiswa Pasif
Route::controller(MhspasifController::class)->group(function () {
    Route::get('show-skema-pasif/{status_id}', 'showSkema')->name('show.skema-pasif');
    Route::get('show-periode/{status_id}/{skema_id}', 'showPeriode')->name('show.periode');
    Route::get('info-users-pasif/{status_id}/{skema_id}/{periode_id}', 'viewUsers')->name('info.users-pasif');

    Route::get('detail-user-pasif/{status_id}/{skema_id}/{periode_id}/{user_id}', 'detailUser')->name('detail.mahasiswa-pasif');
    Route::get('profil-mahasiswa-diberhentikan-admin/{id}/aktifkan', 'diaktifkan')->name('aktifkan.mahasiswa');
    Route::delete('profil-mahasiswa-diberhentikan-admin/{id}/hapus', 'hapus')->name('hapus.mahasiswa-pasif');
});

// Rute Mahasiswa Alumni
Route::controller(AlumniController::class)->group(function () {
    Route::get('show-skema-alumni/{status_id}', 'showSkema')->name('show.skema-alumni');
    Route::get('show-periode-alumni/{status_id}/{skema_id}', 'showPeriode')->name('show.periode-alumni');
    Route::get('info-users-alumni/{status_id}/{skema_id}/{periode_id}', 'viewUsers')->name('info.users-alumni');

    Route::get('detail-user-alumni/{status_id}/{skema_id}/{periode_id}/{user_id}', 'detailUser')->name('detail.alumni');
    Route::get('profil-alumni-admin/{id}/aktifkan', 'diaktifkan')->name('aktifkan.mahasiswa-alumni');
    Route::delete('profil-alumni-admin/{id}/hapus', 'hapus')->name('hapus.alumni');
});

Route::controller(PeriodeController::class)->group(function () {
    Route::post('periode/tambah', 'create')->name('tambah.periode');
    Route::get('periode/hapus/{id_periode}', 'destroy')->name('hapus.periode');
});


// ADMIN

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard-admin', 'index')->name('admin.dashboard')->middleware('isAdmin');
    Route::get('/halaman-utama', 'index')->name('admin.dashboard')->middleware('isAdmin');

    Route::get('/profil-mahasiswa-diberhentikan-admin', 'aktif')->name('admin.profil-mhs-diberhentikan')->middleware('auth');
    Route::get('/profil-mahasiswa-alumni-admin', 'aktif')->name('admin.profil-mhs-alumi')->middleware('auth');

    Route::get('/kontak', 'kontak')->name('admin.kontak')->middleware('auth');
    Route::get('/pesan-otomatis', 'pesanOtomatis')->name('admin.pesan-otomatis')->middleware('auth');

    Route::get('/konfirmasi-akun', 'konfirmasi')->name('admin.konfirmasi-akun');
    Route::get('/konfirmasi-akun/detail-user/{id}', 'detail')->name('admin.detail-akun-konfirmasi');
    Route::post('/konfirmasi-akun/aktivasi/{id}', 'aktivasi')->name('admin.aktivasi-akun');
    Route::post('/konfirmasi-akun/aktivasi-semua', 'aktivasiSemua')->name('admin.aktivasi-semua-akun');
    Route::delete('/konfirmasi-akun/{id}/hapus', 'hapus')->name('admin.hapus-akun');

    Route::get('/daful-mahasiswa-admin', 'index')->name('admin.daful-mhs')->middleware('auth');
});

Route::get('/admin/forms', [AdminController::class, 'indexForm'])->name('admin.forms');
Route::get('/admin/forms/create', [AdminController::class, 'createForm'])->name('admin.forms.create');
Route::post('/admin/forms', [AdminController::class, 'storeForm'])->name('admin.forms.store');
Route::get('/admin/forms/{form}/edit', [AdminController::class, 'editForm'])->name('admin.forms.edit');
Route::put('/admin/forms/{form}', [AdminController::class, 'updateForm'])->name('admin.forms.update');
Route::delete('/admin/forms/{form}', [AdminController::class, 'destroyForm'])->name('admin.forms.destroy');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('forms/{form}/responses', [AdminController::class, 'responsesForm'])->name('forms.responses');
    Route::get('forms/{form}/select-angkatan', [AdminController::class, 'selectAngkatan'])->name('forms.select_angkatan');
    Route::get('forms/{form}/responses/angkatan/{angkatan}', [AdminController::class, 'userResponsesByAngkatan'])->name('forms.user_responses_by_angkatan');
    Route::get('forms/{form}/user/{user}/responses', [AdminController::class, 'userResponses'])->name('forms.user_responses');
});
// END ADMIN

Route::controller(SkemaController::class)->group(function () {
    Route::get('/profil-mahasiswa-aktif-admin{status_id}', 'show')->name('show.skema');
    Route::get('/store-profil-mahasiswa-aktif-admin/{skema_id}', 'store')->name('store.skema');
});

Route::controller(AngkatanController::class)->group(function () {
    Route::get('/profil-mahasiswa-aktif-admin/angkatan', 'show')->name('showw.angkatan');
    Route::get('/store-profil-mahasiswa-aktif-admin/angkatan/{angkatan_id}', 'store')->name('store.angkatan');
    Route::post('profil-mahasiswa-aktif-admin/angkatan/tambah', 'create')->name('tambah_admin.profil-mahasiswa-angkatan');
    Route::get('profil-mahasiswa-aktif-admin/angkatan/hapus/{id_angkatan}', 'destroy')->name('hapus_admin.profil-mahasiswa-angkatan');
});

Route::controller(FakultasController::class)->group(function () {
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas', 'show')->name('showw.fakultas');
    Route::get('store-profil-mahasiswa-aktif-admin/angkatan/fakultas/{fakultas_id}', 'store')->name('store.fakultas');
    Route::post('profil-mahasiswa-aktif-admin/angkatan/fakultas/tambah-fakultas', 'createFakultas')->name('tambah_admin.profil-mahasiswa-fakultas');
    Route::post('profil-mahasiswa-aktif-admin/angkatan/fakultas/tambah-prodi', 'createProdi')->name('tambah_admin.profil-mahasiswa-prodi');
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/hapus{id_fakultas}', 'destroy')->name('hapus_admin.profil-mahasiswa-fakultas');
});


// MAHASISWA
Route::controller(MahasiswaController::class)->group(function () {
    Route::get('profil-mahasiswa-aktif-admin/angkatan/fakultas/mahasiswa', 'index')->name('index.mahasiswa');

    Route::get('profil-mahasiswa-aktif-admin/{id}/detail', 'detail')->name('detail.mahasiswa');
    Route::post('profil-mahasiswa-aktif-admin/{id}/diberhentikan', 'diberhentikan')->name('diberhentikan.mahasiswa');
    Route::post('profil-mahasiswa-aktif-admin/{id}/alumni', 'alumni')->name('alumni.mahasiswa');
    Route::delete('profil-mahasiswa-aktif-admin/{id}/hapus', 'hapus')->name('hapus.mahasiswa');
});

Route::get('/mahasiswa/forms', [MahasiswaController::class, 'indexForm'])->name('mahasiswa.forms');
Route::get('/mahasiswa/forms/{form}', [MahasiswaController::class, 'showForm'])->name('mahasiswa.forms.show');
Route::post('/mahasiswa/forms/{form}/submit', [MahasiswaController::class, 'submitForm'])->name('mahasiswa.forms.submit');

// END MAHASISWA

// CONTROLLER FILE
Route::get('/admin/download/{filename}', [FileController::class, 'downloadFile'])->name('admin.download');
Route::get('/admin/preview/{filename}', [FileController::class, 'previewFile'])->name('admin.preview');

// CONTROLLER GDRIVE
Route::post('/upload', [GoogleDriveController::class, 'upload']);
Route::get('/admin/preview/{fileId}', [GoogleDriveController::class, 'preview']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route untuk lupa password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// REMINDER
Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
Route::delete('/reminders/{id}/hapus', [ReminderController::class, 'hapus'])->name('admin.hapus-broadcast');
