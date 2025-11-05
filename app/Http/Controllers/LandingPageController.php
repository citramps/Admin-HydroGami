<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function getLeaderboardData()
    {
        $leaderboard = User::select('username', 'level', 'coin')
            ->orderByDesc('poin')
            ->take(5)
            ->get();

        return response()->json($leaderboard);
    }

    public function getChartData()
    {
        $weeks = [];
        $playerCounts = [];
        
        for ($i = 7; $i >= 0; $i--) {
            $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();
            
            $playerCount = User::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
            
            $weeks[] = $startOfWeek->format('M d');
            $playerCounts[] = $playerCount;
        }
        
        return response()->json([
            'weeks' => $weeks,
            'player_counts' => $playerCounts
        ]);
    }
}
