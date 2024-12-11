<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MQTTController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'light' => 'required|numeric',
            'soil_moisture' => 'required|numeric',
            'tds' => 'required|numeric',
            'ph' => 'required|numeric',
        ]);

        // Simpan ke database
        DB::table('sensor_data')->insert([
            'temperature' => $validated['temperature'],
            'humidity' => $validated['humidity'],
            'light' => $validated['light'],
            'soil_moisture' => $validated['soil_moisture'],
            'tds' => $validated['tds'],
            'ph' => $validated['ph'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true], 200);
    }
}
