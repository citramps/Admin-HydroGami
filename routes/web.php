<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PanduanController;



Route::get('/register-admin', [AuthController::class, 'showRegisterAdminForm'])->name('register-admin');
Route::post('/register-admin', [AuthController::class, 'registerAdmin'])->name('register-admin');

Route::get('/login-admin', [AuthController::class, 'showLoginAdminForm'])->name('login-admin');
Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login-admin');

Route::post('/logout', [AuthController::class, 'logoutAdmin'])->name('logout');

// Halaman dashboard
Route::get('dashboard-admin', [DashboardController::class, 'index'])
    ->name('dashboard-admin')
    ->middleware('auth');


// Halaman misi
Route::middleware('auth')->group(function () {
    Route::get('/misi', [MisiController::class, 'index'])->name('misi.index');
    Route::get('/misi/create', [MisiController::class, 'create'])->name('misi.create');
    Route::post('/misi', [MisiController::class, 'store'])->name('misi.store');
    Route::get('/misi/{id_misi}/edit', [MisiController::class, 'edit'])->name('misi.edit');
    Route::put('/misi/{id_misi}', [MisiController::class, 'update'])->name('misi.update');
    Route::delete('/misi/{id_misi}', [MisiController::class, 'destroy'])->name('misi.destroy');
});


// Halaman panduan
Route::middleware('auth')->group(function () {
    Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan.index');
    Route::get('/panduan/create', [PanduanController::class, 'create'])->name('panduan.create');
    Route::post('/panduan', [PanduanController::class, 'store'])->name('panduan.store');
    Route::get('/panduan/{id_panduan}/edit', [PanduanController::class, 'edit'])->name('panduan.edit');
    Route::put('/panduan/{id_panduan}', [PanduanController::class, 'update'])->name('panduan.update');
    Route::delete('/panduan/{id_panduan}', [PanduanController::class, 'destroy'])->name('panduan.destroy');
});


// Halaman leaderboard
Route::get('/leaderboard-admin', [LeaderboardController::class, 'index'])
    ->name('leaderboard-admin')
    ->middleware('auth');


// Halaman profile
Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');


});


// Logout 
Route::post('logout', [AuthController::class, 'logout'])->name(name: 'logout');
