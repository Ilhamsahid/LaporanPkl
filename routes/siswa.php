<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('login', fn() => redirectWithAuth('auth.login'))->name('login');

//Siswa Role
Route::middleware('auth:siswa')->prefix('siswa')->name('siswa.')->group
(function(){
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
}
);