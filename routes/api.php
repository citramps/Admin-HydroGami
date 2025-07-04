<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\GamificationController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\RewardController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);
});

Route::prefix('notifikasi')->group(function () {
    Route::get('/', [NotifikasiController::class, 'index']);
    Route::post('/', [NotifikasiController::class, 'store']);
    Route::put('/{id}/read', [NotifikasiController::class, 'markAsRead']);
    Route::delete('/{id}', [NotifikasiController::class, 'destroy']);
    Route::delete('/', [NotifikasiController::class, 'destroyAll']); 

});

Route::get('/sensor_data', [NotifikasiController::class, 'getSensorData']);

Route::post('/sensor-data', [SensorDataController::class, 'store']);
Route::get('/sensor-data', [SensorDataController::class, 'index']);

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::prefix('user')->group(function () {
    // Route Panduan 
    Route::get('/panduan', [PanduanController::class, 'getAllPanduan']);
    Route::get('/panduan/{id}', [PanduanController::class, 'getPanduanDetail']);
    
    // Route Misi 
    Route::get('/misi', [MisiController::class, 'getAllMisi']);
    Route::get('/misi/{id}', [MisiController::class, 'getMisiDetail']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'id' => $request->user()->id,
        'username' => $request->user()->username,
        'email' => $request->user()->email,
    ]);
});

Route::get('/test', function () {
    return ['message' => 'API berjalan'];
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/gamification', [GamificationController::class, 'show']);
    Route::put('/gamification', [GamificationController::class, 'update']);
});

Route::get('/leaderboard', [LeaderboardController::class, 'index']);

Route::prefix('rewards')->group(function () {
    Route::get('/', [RewardController::class, 'apiIndex']);
    Route::get('/gacha', [RewardController::class, 'apiGachaRewards']);
    Route::get('/redeem', [RewardController::class, 'apiRedeemRewards']);
});



