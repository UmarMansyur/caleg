<?php

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

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('beranda');
});
Route::get('/tps', function () {
    return view('tps');
});
Route::get('/calon', function () {
    return view('calon');
});
Route::get('/saksi', function () {
    return view('saksi');
});
Route::get('/saksi/beranda', function () {
    return view('saksi.beranda');
});
Route::get('/saksi/lapor', function () {
    return view('saksi.lapor');
});
Route::get('/saksi/lapor/upload', function () {
    return view('saksi.upload');
})->name('upload');
Route::get('/verifikator', function () {
    return view('verifikasi');
})->name('verifikasi');

Route::get('/verifikator/menunggu-persetujuan', function () {
    return view('validasi');
})->name('Menunggu Persetujuan');


Route::get('/verifikator/disetujui', function () {
    return view('validasi');
})->name('Disetujui');


Route::get('/verifikator/revisi', function () {
    return view('validasi');
})->name('Revisi');

Route::get('/verifikator/detail', function () {
    return view('detail');
})->name('Detail Berkas');
