<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:pembimbing')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
});

//Pembimbing Role
Route::middleware('auth:pembimbing')->prefix('pembimbing')->name('pembimbing.')->group(function () {
Route::get('/dashboard', fn() => view('pembimbing.dashboard.index'))->name('dashboard');
});