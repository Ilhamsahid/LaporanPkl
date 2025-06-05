<?php


use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TempatPklController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\AbsensiPklController;
use App\Http\Controllers\LaporanPklController;
use App\Http\Controllers\PenilaianPklController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hapussession', [PembimbingController::class, 'hapussession'])->name('login.proses');

Route::post('/login', [PembimbingController::class, 'login'])->name('login.proses');

Route::middleware('auth:pembimbing')->group(function(){
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::resource('/siswa', SiswaController::class)->except(['show']);
    Route::resource('/pembimbing', PembimbingController::class)->except(['show']);
    Route::resource('/pkl', TempatPklController::class)->except(['show']);
    Route::resource('/laporan', LaporanPklController::class)->except(['show']);
    Route::resource('/penilaian', PenilaianPklController::class)->except(['show']);
    Route::resource('/absensi', AbsensiPklController::class)->except(['show']);
    // routes/web.php atau routes/api.php
    Route::get('/kelas/{id}/siswa', function ($id) {
        $siswa = App\Models\Siswa::where('kelas_id', $id)->get();
        return response()->json($siswa);
    });

    Route::post('/clear-modal-errors', function () {
        session()->forget('errors');
        session()->forget('_old_input');
        return response()->json(['status' => 'ok']);
    })->name('modal.clear-errors');
});

Route::middleware('guest:pembimbing')->group(function(){
    Route::get('/login', fn() => view('auth.login'))->name('login');
});