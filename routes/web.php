<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PilihanController;

Route::get('/', function () {
    return view('login');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [PilihanController::class, 'showDashboard'])->name('dashboard');
Route::post('/update-pilihan-bem', [PilihanController::class, 'updatePilihanBem'])->name('updatePilihanBem');
Route::get('/pilih-hima', [PilihanController::class, 'showPilihHima'])->name('pilihHima');
Route::post('/update-pilihan-hima', [PilihanController::class, 'updatePilihanHima'])->name('updatePilihanHima');