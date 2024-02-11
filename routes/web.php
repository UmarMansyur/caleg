<?php

use App\Http\Controllers\ApiSaksi;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\SaksiController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\VerifikatorController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/api/v1/saksi', [ApiSaksi::class, 'index']);
Route::post('/api/v1/saksi', [ApiSaksi::class, 'laporFormC1']);
Route::post('/api/v1/saksi/tidak-sah', [ApiSaksi::class, 'laporSuaraTidakSah'])->name('laporSuaraTidakSah');
Route::post('/api/v1/saksi/partai', [ApiSaksi::class, 'laporSuaraPartai'])->name('laporSuaraPartai');
Route::get('/api/v1/saksi/lihat-data', [ApiSaksi::class, 'getDataForm'])->name('getDataForm');
Route::post('/api/v1/saksi/upload', [ApiSaksi::class, 'uploadFile'])->name('Upload File C1');
Route::post('api/v1/verifikasi', [VerifikatorController::class, 'verifikasi'])->name('Verifikasi Berkas');
Route::get('/api/v1/data-perolehan', [DashboardController::class, 'dataArray'])->name('Data Perolehan Suara');
Route::post('/api/v1/data-revisi', [VerifikatorController::class, 'revisi'])->name('Revisi Data');

Route::post('/login', [Authentication::class, 'login'])->name('authenticate');
Route::get('/logout', [Authentication::class, 'logout'])->name('logout');
Route::get('/forgot-password', [Authentication::class, 'forgotView'])->name('Forgot Password');
Route::post('/forgot-password', [Authentication::class, 'forgotPassword'])->name('ForgotPassword');
Route::get('/reset-password', [Authentication::class, 'resetView'])->name('Reset Password');
Route::post('/reset-password', [Authentication::class, 'resetPassword'])->name('ResetPassword');
Route::get('/login', function () {
    // jika remember token di isi maka, auto login
    if(Auth::viaRemember()) {
        return redirect('/');
    }
    if (auth()->user() != null || auth()->user() != '') {
        return redirect('/');
    }
    return view('login');
})->name('login');

Route::group(['prefix' => '', 'middleware' => 'admin'], function () {
    Route::group(['prefix' => 'tps'], function () {
        Route::get('/', [TpsController::class, 'index'])->name('Lihat TPS');
        Route::post('/', [TpsController::class, 'create'])->name('Tambah TPS');
        Route::post('/{id}', [TpsController::class, 'edit'])->name('Edit TPS');
        Route::get('/data/{id}', [TpsController::class, 'showById'])->name('Ubah Data TPS');
        Route::delete('/{id}', [TpsController::class, 'destroy'])->name('Hapus TPS');
        Route::get('/tps', [TpsController::class, 'show'])->name('Data TPS');
    });

    Route::group(['prefix' => 'calon'], function () {
        Route::get('/', [CalonController::class, 'index'])->name('Lihat Calon');
        Route::post('/', [CalonController::class, 'create'])->name('Tambah Calon');
        Route::post('/{id}', [CalonController::class, 'edit'])->name('Edit Calon');
        Route::get('/data/{id}', [CalonController::class, 'showById'])->name('Ubah Data Calon');
        Route::delete('/{id}', [CalonController::class, 'destroy'])->name('Hapus Calon');
        Route::get('/calon', [CalonController::class, 'show'])->name('Data Calon');
    });

    Route::group(['prefix' => 'saksi'], function () {
        Route::get('/', [SaksiController::class, 'index'])->name('Lihat Saksi');
        Route::post('/', [SaksiController::class, 'create'])->name('Tambah Saksi');
        Route::post('/{id}', [SaksiController::class, 'edit'])->name('Edit Saksi');
        Route::get('/data/{id}', [SaksiController::class, 'showById'])->name('Ubah Data Saksi');
        Route::delete('/{id}', [SaksiController::class, 'destroy'])->name('Hapus Saksi');
        Route::get('/saksi', [SaksiController::class, 'show'])->name('Data Saksi');
    });

    Route::post('/upload-saksi', [LaporController::class, 'create'])->name('Tambah Lapor');
    Route::group(['prefix' => 'saksi/lapor'], function () {
        Route::get('/lapor', [LaporController::class, 'upload'])->name('Lihat Lapor');
        Route::post('/lapor-suara-partai', [LaporController::class, 'laporPartai'])->name('Lapor Suara Partai');
        Route::post('/lapor-suara-tidak-sah', [LaporController::class, 'laporSuaraTidakSah'])->name('Lapor Suara Tidak Sah');
        Route::get('/upload', [LaporController::class, 'upload'])->name('upload');
        Route::post('upload/{id}', [LaporController::class, 'edit'])->name('Edit Lapor');
        Route::get('/data/{id}', [LaporController::class, 'showById'])->name('Ubah Data Lapor');
        Route::delete('/{id}', [LaporController::class, 'destroy'])->name('Hapus Lapor');
        Route::get('/saksi', [LaporController::class, 'show'])->name('Data Lapor');
    });
    Route::get('/', [DashboardController::class, 'index'])->name('Beranda');
    Route::get('/lapor', [LaporController::class, 'upload'])->name('Saksi Lapor');

    Route::group(['prefix' => 'verifikator'], function () {
        Route::get('/menunggu-persetujuan', [VerifikatorController::class, 'index'])->name('Menunggu Persetujuan');
        Route::get('/disetujui', [VerifikatorController::class, 'disetujui'])->name('Disetujui');
        Route::get('/revisi', [VerifikatorController::class, 'ditolak'])->name('Revisi');
        Route::get('/detail/{id}', [VerifikatorController::class, 'detail'])->name('Detail Berkas');
    });
});






Route::get('/saksi/beranda', function () {
    return view('saksi.beranda');
});
