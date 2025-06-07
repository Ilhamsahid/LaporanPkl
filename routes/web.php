<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenilaianPklController;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php atau routes/api.php
Route::get('/kelas/{id}/siswa', [PenilaianPklController::class, 'getSiswaByKelas']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');