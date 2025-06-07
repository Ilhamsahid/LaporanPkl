<?php


use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TempatPklController;
use App\Http\Controllers\AbsensiPklController;
use App\Http\Controllers\LaporanPklController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PenilaianPklController;

Route::middleware('guest:admin')->group(function(){
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.proses');
});

// Admin Role
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('/siswa', SiswaController::class)->except(['show']);
    Route::resource('/pembimbing', PembimbingController::class)->except(['show']);
    Route::resource('/pkl', TempatPklController::class)->except(['show']);
    Route::resource('/laporan', LaporanPklController::class)->except(['show']);
    Route::resource('/penilaian', PenilaianPklController::class)->except(['show']);
    Route::resource('/absensi', AbsensiPklController::class)->except(['show']);
});