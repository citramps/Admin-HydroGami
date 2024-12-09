<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'soil_moisture' => 'required|numeric',
            'light_level' => 'required|numeric',
            'tds_value' => 'required|numeric',
        ]);

        // Simpan data ke database (opsional)
        // $data = SensorData::create($request->all());

        return response()->json(['message' => 'Data berhasil diterima', 'data' => $request->all()], 200);
    }
}
