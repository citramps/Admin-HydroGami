<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
| Semua route di bawah prefix /api
|-------------------------------------------------------------------------- 
*/

// =====================================================
// TEST ROUTE
// =====================================================
Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API berjalan dengan baik',
        'timestamp' => now(),
    ]);
});

// =====================================================
// AUTHENTICATION (REGISTER / LOGIN)
// =====================================================
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// =====================================================
// SENSOR DATA (PUBLIC - untuk ESP32 / IoT)
// =====================================================
Route::prefix('sensor-data')->group(function () {
    Route::post('/', [SensorDataController::class, 'store']);
    Route::get('/', [SensorDataController::class, 'index']);
});

// =====================================================
// SENSOR DATA UNTUK NOTIFIKASI
// =====================================================
Route::get('/sensor_data', [NotifikasiController::class, 'getSensorData']);

// =====================================================
// PUBLIC ROUTES
// =====================================================
Route::prefix('user')->group(function () {

    // PANDUAN
    Route::prefix('panduan')->group(function () {
        Route::get('/', [PanduanController::class, 'getAllPanduan']);
        Route::get('/{id}', [PanduanController::class, 'getPanduanDetail']);
    });

    // MISI
    Route::prefix('misi')->group(function () {
        Route::get('/', [MisiController::class, 'getAllMisi']);
        Route::get('/{id}', [MisiController::class, 'getMisiDetail']);
    });
});

// LEADERBOARD (tetap di root agar cocok sama Flutter lo)
Route::get('/leaderboard', [LeaderboardController::class, 'index']);

// REWARDS (Public)
Route::prefix('rewards')->group(function () {
    Route::get('/', [RewardController::class, 'apiIndex']);
    Route::get('/gacha', [RewardController::class, 'apiGachaRewards']);
    Route::get('/redeem', [RewardController::class, 'apiRedeemRewards']);
});

// =====================================================
// PROTECTED ROUTES (perlu Bearer Token Auth)
// =====================================================
Route::middleware('auth:sanctum')->group(function () {

    // USER INFO
    Route::get('/user', function (Request $request) {
        return response()->json([
            'id' => $request->user()->id,
            'username' => $request->user()->username,
            'email' => $request->user()->email,
            'poin' => $request->user()->poin ?? 0,
        ]);
    });

    // UPDATE PROFILE
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);

    // GAMIFICATION SYSTEM
    Route::prefix('gamification')->group(function () {
        Route::get('/', [GamificationController::class, 'show']);
        Route::put('/', [GamificationController::class, 'update']);
    });

    // MISI (Protected)
    Route::prefix('user/misi')->group(function () {
        Route::post('/auto', [MisiController::class, 'createAutoMission']);
        Route::get('/active', [MisiController::class, 'getActiveMissionByParameter']);
        Route::patch('/{id}/complete', [MisiController::class, 'completeMission']);
        Route::delete('/auto/cleanup', [MisiController::class, 'cleanupAutoMissions']);
        Route::delete('/auto/expired', [MisiController::class, 'deleteExpiredAutoMissions'])->name('misi.delete-expired-auto');
        Route::delete('/auto/all', [MisiController::class, 'deleteAllAutoMissions'])->name('misi.delete-all-auto');
    });

    // NOTIFIKASI (Protected)
    Route::prefix('notifikasi')->group(function () {
        Route::get('/', [NotifikasiController::class, 'index']);
        Route::post('/', [NotifikasiController::class, 'store']);
        Route::put('/{id}/read', [NotifikasiController::class, 'markAsRead']);
        Route::delete('/{id}', [NotifikasiController::class, 'destroy']);
        Route::delete('/', [NotifikasiController::class, 'destroyAll']);
    });

    // REDEEM REWARD (Protected)
    Route::post('/rewards/redeem', [RewardController::class, 'redeemReward']);
});

// =====================================================
// FALLBACK (404 Handler)
// =====================================================
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Endpoint tidak ditemukan. Periksa URL dan method HTTP Anda.',
    ], 404);
});
