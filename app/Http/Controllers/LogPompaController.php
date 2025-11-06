<?php

namespace App\Http\Controllers;

use App\Models\PumpControlLog;
use App\Models\User;
use Illuminate\Http\Request;

class LogPompaController extends Controller
{
    public function index(Request $request)
    {
        $query = PumpControlLog::latest();

        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter berdasarkan pompa
        if ($request->has('pump_name') && $request->pump_name) {
            $query->where('pump_name', $request->pump_name);
        }

        // Filter berdasarkan username
        if ($request->has('username') && $request->username) {
            $query->where('username', 'like', '%' . $request->username . '%');
        }

        // Filter berdasarkan action
        if ($request->has('action') && $request->action) {
            $query->where('action', $request->action);
        }

        $logs = $query->paginate(20);

        return view('pump-logs', compact('logs'));
    }

    // Method untuk menentukan action
    private function determineAction($oldValue, $newValue)
    {
        if ($oldValue == 0 && $newValue > 0) {
            return 'on';
        } elseif ($oldValue > 0 && $newValue == 0) {
            return 'off';
        } else {
            return 'adjust';
        }
    }

    // Method untuk API dari Flutter
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pump_name' => 'required|string|max:255|in:A MIX,B MIX,PH UP,PH DOWN',
            'old_value' => 'required|integer|min:0|max:100',
            'new_value' => 'required|integer|min:0|max:100',
        ]);

        // Ambil user data
        $user = User::find($validated['user_id']);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        // Tentukan action
        $action = $this->determineAction($validated['old_value'], $validated['new_value']);

        // Simpan log
        $log = PumpControlLog::create([
            'user_id' => $user->id,
            'username' => $user->username, // Ambil username dari tabel users
            'pump_name' => $validated['pump_name'],
            'old_value' => $validated['old_value'],
            'new_value' => $validated['new_value'],
            'action' => $action
        ]);

        return response()->json([
            'success' => true,
            'data' => $log,
            'action' => $action
        ], 201);
    }
}