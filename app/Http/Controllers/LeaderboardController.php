<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $users = User::select('id', 'username', 'poin', 'coin', 'level', 'created_at')
            ->orderByDesc('poin')
            ->take(50)
            ->get();

        // Return JSON for API requests
        if ($request->wantsJson()) {
            return response()->json($users);
        }

        // Return view for web requests
        return view('leaderboard-admin', [
            'leaderboard' => $users
        ]);
        
    }
    
}

