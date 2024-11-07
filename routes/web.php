<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MisiController;


Route::get('/', function () {
    return view('welcome');
});

Route::get(uri: '/login', action: [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/dashboard', function () {
    return view('dashboard'); // ganti dengan tampilan dashboard Anda
})->name('dashboard')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/misi', [MisiController::class, 'index'])->name('misi.index');
Route::get('/misi/create', [MisiController::class, 'create'])->name('misi.create');


Route::get('/missions', [MissionController::class, 'index'])->name('missions.index')->middleware('auth');
Route::get('/missions/create', [MissionController::class, 'create'])->name('missions.create')->middleware('auth');
Route::get('/missions/{id}/edit', [MissionController::class, 'edit'])->name('missions.edit')->middleware('auth');
Route::put('/missions/{id}', [MissionController::class, 'update'])->name('missions.update')->middleware('auth');
Route::delete('/missions/{id}', [MissionController::class, 'destroy'])->name('missions.destroy')->middleware('auth');
