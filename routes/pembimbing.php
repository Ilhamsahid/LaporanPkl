<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiPklController;
use App\Http\Controllers\LaporanPklController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PenilaianPklController;
use App\Http\Controllers\TempatPklController;

Route::get('login', fn() => redirectWithAuth('auth.login'))->name('login');

//Pembimbing Role
Route::middleware('auth:pembimbing')->prefix('pembimbing')->name('pembimbing.')->group(function () {
    Route::get('/dashboard', fn() => view('pembimbing.dashboard.index'))->name('dashboard');
    Route::get('/profil', [PembimbingController::class, 'profil'])->name('profil');
    Route::resource('/siswa', SiswaController::class)->except(['show']);
    Route::resource('/laporan', LaporanPklController::class)->except(['show']);
    Route::resource('/pkl', TempatPklController::class)->except(['show']);
    Route::resource('/penilaian', PenilaianPklController::class)->except(['show']);
    Route::resource('/absensi', AbsensiPklController::class)->except(['show']);
});