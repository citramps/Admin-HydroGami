<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan bahwa semua data yang diperlukan sudah ada
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'light' => 'required|numeric',
            'soil_moisture' => 'required|numeric',
            'tds' => 'required|numeric',
            'ph' => 'required|numeric',
        ]);

        try {
            // Mencoba menyimpan data ke database
            $sensorData = SensorData::create([
                'temperature' => $validated['temperature'],
                'humidity' => $validated['humidity'],
                'light' => $validated['light'],
                'soil_moisture' => $validated['soil_moisture'],
                'tds' => $validated['tds'],
                'ph' => $validated['ph'],
            ]);

            return response()->json([
                'message' => 'Sensor data saved successfully',
                'data' => $sensorData,
            ], 200);
        } catch (\Exception $e) {
            // Menangani error jika terjadi masalah saat menyimpan
            return response()->json([
                'message' => 'Error saving data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        // Mengambil semua data sensor
        $sensorData = SensorData::latest()->get();

        return response()->json([
            'message' => 'Sensor data fetched successfully',
            'data' => $sensorData,
        ]);
    }
}
