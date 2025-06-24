<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'temperature' => 'required|numeric|between:-50,100',
            'humidity' => 'required|numeric|between:0,100',
            'light' => 'required|numeric|min:0',
            'soil_moisture' => 'required|integer|between:0,100',
            'tds' => 'required|numeric|min:0',
            'ph' => 'required|numeric|between:0,14',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $sensorData = SensorData::create($validator->validated());

            return response()->json([
                'message' => 'Sensor data saved successfully',
                'data' => $sensorData,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error saving sensor data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $sensorData = SensorData::latest()->paginate(10);

            return response()->json([
                'message' => 'Sensor data fetched successfully',
                'data' => $sensorData->items(),
                'meta' => [
                    'current_page' => $sensorData->currentPage(),
                    'last_page' => $sensorData->lastPage(),
                    'per_page' => $sensorData->perPage(),
                    'total' => $sensorData->total(),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching sensor data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function latest()
    {
        try {
            $latestData = SensorData::latest()->first();

            if (!$latestData) {
                return response()->json([
                    'message' => 'No sensor data available'
                ], 404);
            }

            return response()->json([
                'message' => 'Latest sensor data fetched',
                'data' => $latestData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching latest data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function timeframe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start' => 'required|date',
            'end' => 'required|date|after:start'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = SensorData::whereBetween('created_at', [
                $request->start,
                $request->end
            ])->get();

            return response()->json([
                'message' => 'Data retrieved successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}