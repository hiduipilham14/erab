<?php

use App\Http\Controllers\AksesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\dataDiameter\dataDiameterController;
use App\Http\Controllers\dataDivisi\dataDivisiController;
use App\Http\Controllers\dataJaringanBaru\dataJaringanBaruController;
use App\Http\Controllers\dataPenggantianPipa\dataPenggantianPipaController;
use App\Http\Controllers\dataPipa\dataPipaController;
use App\Http\Controllers\dataRab\dataRabController;
use App\Http\Controllers\dataUpdateGis\dataUpdateGisController;
use App\Http\Controllers\Jabatan\JabatanController;
use App\Http\Controllers\laporanGis\LaporanGisController;
use App\Http\Controllers\laporanRab\LaporanRabController;
use App\Http\Controllers\pengaturanAkun\PengaturanAkunController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tahunController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [AuthController::class, 'index'])->name('login.login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['middleware' => ['auth', 'nocache']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //route logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('data-divisi', dataDivisiController::class);
    Route::resource('data-diameter', dataDiameterController::class);
    Route::resource('data-pipa', dataPipaController::class);
    Route::resource('data-rab', dataRabController::class);
    Route::resource('data-update-gis', dataUpdateGisController::class);
    Route::resource('data-jaringan-baru', dataJaringanBaruController::class);
    Route::resource('data-penggantian-pipa', dataPenggantianPipaController::class);

    // Route::resource('permission', PermissionController::class)->middleware('role:superadmin');
    Route::resource('user', UserController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('akses', AksesController::class);
    Route::resource('pengaturan-akun', PengaturanAkunController::class);

    // Tampilkan halaman pengaturan akun
    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])->name('pengaturan-akun.index');

    // Update profil
    Route::put('/profile', [PengaturanAkunController::class, 'update'])->name('profile.update');

    // Update password
    Route::put('/profile/password', [PengaturanAkunController::class, 'password'])->name('profile.password');
    
    // Laporan
    Route::resource('laporan-gis', LaporanGisController::class)->except(['show']);
    Route::resource('laporan-rab', LaporanRabController::class)->except(['show']);
    Route::get('/laporan-rab/test', [LaporanRabController::class, 'testLaporan']);

    // Laporangis tambahan: route untuk ambil data
    Route::get('laporangis/data', [LaporangisController::class, 'getData'])->name('laporangis.data');

    Route::resource('data-tahun', tahunController::class);

    Route::prefix('spam')->group(function() {
        Route::get('/', [App\Http\Controllers\spamController::class, 'index']);
        Route::get('/table', [App\Http\Controllers\spamController::class, 'table']);
        Route::get('detail/{id}', [App\Http\Controllers\spamController::class, 'detail']);
        Route::post('/create', [App\Http\Controllers\spamController::class, 'save']);
        Route::get('/delete/{id}', [App\Http\Controllers\spamController::class, 'delete']);
    });
});

  Route::get('/buat-storage-link', function () {
        Artisan::call('storage:link');
        return 'Storage link berhasil dibuat!';
    });

