<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\SensorDataController;



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

Route::post('/sensor-data', [SensorDataController::class, 'store']);
Route::get('/sensor-data', [SensorDataController::class, 'index']);

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::prefix('user')->group(function () {
    Route::get('/panduan', [PanduanController::class, 'getAllPanduan']); // Mendapatkan semua panduan
    Route::get('/panduan/{id}', [PanduanController::class, 'getPanduanDetail']); // Mendapatkan detail panduan
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
