<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\RewardController;

Route::get('/', function () {
    return redirect()->route('login-admin');
});

Route::get('/register-admin', [AuthController::class, 'showRegisterAdminForm'])->name('register-admin');
Route::post('/register-admin', [AuthController::class, 'registerAdmin'])->name('register-admin');

Route::get('/login-admin', [AuthController::class, 'showLoginAdminForm'])->name('login-admin');
Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login-admin');
Route::get('/login', function () {
    return redirect()->route('login-admin');
})->name('login');

// UBAH: Tambah '/' dan ganti middleware jadi 'auth:admin'
Route::get('/dashboard-admin', [DashboardController::class, 'index'])
    ->name('dashboard-admin')
    ->middleware('auth:admin');

// UBAH: Ganti semua middleware jadi 'auth:admin'
Route::middleware('auth:admin')->group(function () {
    // Halaman misi
    Route::get('/misi', [MisiController::class, 'index'])->name('misi.index');
    Route::get('/misi/create', [MisiController::class, 'create'])->name('misi.create');
    Route::post('/misi', [MisiController::class, 'store'])->name('misi.store');
    Route::get('/misi/{id_misi}/edit', [MisiController::class, 'edit'])->name('misi.edit');
    Route::put('/misi/{id_misi}', [MisiController::class, 'update'])->name('misi.update');
    Route::delete('/misi/{id_misi}', [MisiController::class, 'destroy'])->name('misi.destroy');

    // Halaman panduan
    Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan.index');
    Route::get('/panduan/create', [PanduanController::class, 'create'])->name('panduan.create');
    Route::post('/panduan', [PanduanController::class, 'store'])->name('panduan.store');
    Route::get('/panduan/{id_panduan}/edit', [PanduanController::class, 'edit'])->name('panduan.edit');
    Route::put('/panduan/{id_panduan}', [PanduanController::class, 'update'])->name('panduan.update');
    Route::delete('/panduan/{id_panduan}', [PanduanController::class, 'destroy'])->name('panduan.destroy');

    // Halaman leaderboard
    Route::get('/leaderboard-admin', [LeaderboardController::class, 'index'])->name('leaderboard-admin');

    // Halaman profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    // Halaman Rewards
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::get('/reward/create', [RewardController::class, 'create'])->name('reward.create');
    Route::post('/reward', [RewardController::class, 'store'])->name('reward.store');
    Route::get('/reward/{id}/edit', [RewardController::class, 'edit'])->name('reward.edit');
    Route::put('/reward/{id}', [RewardController::class, 'update'])->name('reward.update');
    Route::delete('/reward/{id}', [RewardController::class, 'destroy'])->name('reward.destroy');
});

// UBAH: Satu route logout aja, pakai guard admin
Route::post('/logout', [AuthController::class, 'logoutAdmin'])->name('logout');