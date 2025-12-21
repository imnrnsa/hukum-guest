<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\KategoriDokumenController;
use App\Http\Controllers\DokumenHukumController;
use App\Http\Controllers\RiwayatPerubahanController;
use App\Http\Controllers\LampiranDokumenController;
use App\Http\Controllers\AuthController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('jenis-dokumen', JenisDokumenController::class);
Route::resource('kategori-dokumen', KategoriDokumenController::class);
Route::resource('dokumen-hukum', DokumenHukumController::class);
Route::resource('riwayat-perubahan', RiwayatPerubahanController::class);
Route::resource('lampiran-dokumen', LampiranDokumenController::class);


// ========== AUTH ==========
// Hanya untuk pengunjung (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Logout hanya untuk yang login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ========== DASHBOARD ==========
// Hanya user login yang boleh masuk
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index']);
});
