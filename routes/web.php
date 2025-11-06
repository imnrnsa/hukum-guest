<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/search', [GuestController::class, 'search'])->name('search');
Route::get('/document/{id}', [GuestController::class, 'documentDetail'])->name('document.detail');
Route::get('/category/{categoryId}', [GuestController::class, 'categoryDocuments'])->name('category.documents');
Route::get('/type/{typeId}', [GuestController::class, 'typeDocuments'])->name('type.documents');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [AuthController::class, 'dashboard'])->name('home')->middleware('auth');

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
