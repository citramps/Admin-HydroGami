<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $leaderboard = DB::table('leaderboard')
            ->join('pengguna', 'leaderboard.id_pengguna', '=', 'pengguna.id_pengguna')
            ->select(
                'leaderboard.id_pengguna',
                'pengguna.username as nama_pengguna',
                'leaderboard.total_poin',
                'leaderboard.created_at'
            )
            ->orderByDesc('leaderboard.total_poin')
            ->get();

        $weeklyData = [20, 35, 25, 45, 30, 25, 30, 45];

        return view('dashboard-admin', compact('admin', 'leaderboard', 'weeklyData'));
    }
    
}
