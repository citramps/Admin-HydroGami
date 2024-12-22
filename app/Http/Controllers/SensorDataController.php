<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'light' => 'required|numeric',
            'soil_moisture' => 'required|numeric',
            'tds' => 'required|integer',
            'ph' => 'required|integer',
        ]);

        $sensorData = SensorData::create($validated);

        return response()->json([
            'message' => 'Sensor data saved successfully',
            'data' => $sensorData,
        ]);
    }

    public function index()
    {
        $sensorData = SensorData::latest()->get();

        return response()->json([
            'message' => 'Sensor data fetched successfully',
            'data' => $sensorData,
        ]);
    }
}
