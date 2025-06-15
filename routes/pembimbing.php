<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LaporanPklController;

Route::get('login', fn() => redirectWithAuth('auth.login'))->name('login');

//Pembimbing Role
Route::middleware('auth:pembimbing')->prefix('pembimbing')->name('pembimbing.')->group(function () {
    Route::get('/dashboard', fn() => view('pembimbing.dashboard.index'))->name('dashboard');
    Route::resource('/siswa', SiswaController::class)->except(['show']);
    Route::resource('/laporan', LaporanPklController::class)->except(['show']);
});