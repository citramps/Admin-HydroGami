<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        // Mengambil data leaderboard dengan relasi pengguna
        $leaderboard = Leaderboard::with('pengguna')
            ->orderByDesc('total_poin')
            ->get();

        return view('leaderboard-admin', compact('admin', 'leaderboard'));
    }
}
