<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\SensorData; // Added missing import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this import


class NotifikasiController extends Controller
{
    public function index()
    {
        try {
            $notifications = Notifikasi::orderBy('waktu_dibuat', 'desc')->get();

            return response()->json([
                'success' => true,
                'message' => 'Data notifikasi berhasil diambil',
                'data' => $notifications
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

// NotifikasiController.php
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id_sensor' => 'required',
        'jenis_sensor' => 'required|string',
        'pesan' => 'required|string',
        'status' => 'required|string|in:info,warning,danger',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        $notifikasi = Notifikasi::create([
            'id_sensor' => $request->id_sensor,
            'jenis_sensor' => $request->jenis_sensor,
            'pesan' => $request->pesan,
            'status' => $request->status,
            'dibaca' => 0,
            'waktu_dibuat' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi berhasil disimpan',
            'data' => $notifikasi
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}

    public function markAsRead($id)
    {
        try {
            $notification = Notifikasi::findOrFail($id);
            $notification->update(['dibaca' => 1]);

            return response()->json([
                'success' => true,
                'message' => 'Notifikasi berhasil ditandai sebagai dibaca'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function getSensorData()
    {
        try {
            $sensorData = SensorData::orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Data sensor berhasil diambil',
                'data' => $sensorData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
{
    try {
        $notification = Notifikasi::findOrFail($id);
        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi berhasil dihapus'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}
public function destroyAll()
{
    try {
        // Hapus semua notifikasi tanpa filter user
        $deleted = Notifikasi::truncate(); // atau Notifikasi::query()->delete()
        
        return response()->json([
            'success' => true,
            'message' => 'Semua notifikasi berhasil dihapus',
            'data' => $deleted
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus notifikasi',
            'error' => $e->getMessage()
        ], 500);
    }
}
}