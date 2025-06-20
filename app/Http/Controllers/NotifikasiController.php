<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        try {
            $notifikasi = Notifikasi::create([
                'id_sensor' => $request->id_sensor,
                'jenis_sensor' => $request->jenis_sensor,
                'pesan' => $request->pesan,
                'status' => $request->status,
                'dibaca' => 0,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Notifikasi berhasil disimpan',
                'data' => $notifikasi
            ], 200);
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
}
