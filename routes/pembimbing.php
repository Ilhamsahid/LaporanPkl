<?php

use App\Http\Controllers\AbsensiPklController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LaporanPklController;
use App\Http\Controllers\PenilaianPklController;

Route::get('login', fn() => redirectWithAuth('auth.login'))->name('login');

//Pembimbing Role
Route::middleware('auth:pembimbing')->prefix('pembimbing')->name('pembimbing.')->group(function () {
    Route::get('/dashboard', fn() => view('pembimbing.dashboard.index'))->name('dashboard');
    Route::get('/profil', fn() => view('pembimbing.profil.index'))->name('profil');
    Route::resource('/siswa', SiswaController::class)->except(['show']);
    Route::resource('/laporan', LaporanPklController::class)->except(['show']);
    Route::resource('/penilaian', PenilaianPklController::class)->except(['show']);
    Route::resource('/absensi', AbsensiPklController::class)->except(['show']);
});