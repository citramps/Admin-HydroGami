<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/misi', [MisiController::class, 'index'])->name('misi.index');
Route::get('/misi/create', [MisiController::class, 'create'])->name('misi.create');
Route::post('/misi', [MisiController::class, 'store'])->name('misi.store');
Route::get('/misi/{id}/edit', [MisiController::class, 'edit'])->name('misi.edit');
Route::post('/misi/{id}/update', [MisiController::class, 'update'])->name('misi.update');
Route::delete('/misi/{id}', [MisiController::class, 'destroy'])->name('misi.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');



