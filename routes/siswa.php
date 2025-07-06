<?php

use App\Http\Controllers\LaporanPklController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('login', fn() => redirectWithAuth('auth.login'))->name('login');

//Siswa Role
Route::middleware('auth:siswa')->prefix('siswa')->name('siswa.')->group
(function(){
    Route::get('/laporan/json', [LaporanPklController::class, 'json'])->name('siswa.laporan.json');
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
    Route::resource('/laporan', LaporanPklController::class)->except(['show']);
    Route::post('/siswa/laporan', [LaporanPklController::class, 'store'])->name('siswa.laporan.store');
}
);