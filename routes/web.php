<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MisiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/misi', [MisiController::class, 'index'])->name('misi.index');
Route::get('/misi/create', [MisiController::class, 'create'])->name('misi.create');
Route::get('/misi/{id}/edit', [MisiController::class, 'edit'])->name('misi.edit');
