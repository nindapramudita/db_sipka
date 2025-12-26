<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;


// ---- LOGIN -----
Route::get('backend/login', [LoginController::class, 'loginBackend'])
    ->name('backend.login');

Route::post('backend/login', [LoginController::class, 'authenticateBackend'])
    ->name('backend.login.process');

Route::post('backend/logout', [LoginController::class, 'logoutBackend'])
    ->name('backend.logout');


// ---- HALAMAN YANG HARUS LOGIN ----
Route::middleware(['auth'])->group(function () {

    // Beranda
    Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])
        ->name('backend.beranda');


    // Laporan CRUD
    Route::resource('laporan', LaporanController::class)
    ->middleware('auth');


    // User CRUD
   Route::resource('backend/user', UserController::class, ['as' => 'backend'])
    ->middleware('auth');

});