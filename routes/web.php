<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DokumenHukumController;
use App\Models\KategoriDokumen;
use App\Models\DokumenHukum;
use App\Models\JenisDokumen;

// Public Routes
Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/search', [GuestController::class, 'search'])->name('search');
Route::get('/document/{id}', [GuestController::class, 'documentDetail'])->name('document.detail');
Route::get('/category/{categoryId}', [GuestController::class, 'categoryDocuments'])->name('category.documents');
Route::get('/type/{typeId}', [GuestController::class, 'typeDocuments'])->name('type.documents');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalKategori = KategoriDokumen::count();
        $totalDokumen = DokumenHukum::count();
        $totalJenis = JenisDokumen::count();
        return view('admin.dashboard', compact('totalKategori', 'totalDokumen', 'totalJenis'));
    })->name('dashboard');
    
    Route::resource('kategori', KategoriController::class);
    Route::resource('dokumen', DokumenHukumController::class);
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [AuthController::class, 'updatePassword'])->name('password.change');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Fallback
Route::fallback(function () {
    return view('errors.404');
});