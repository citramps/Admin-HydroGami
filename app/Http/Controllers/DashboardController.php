<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        
        // Data leaderboard
        $leaderboard = User::select('id', 'username', 'poin', 'coin', 'level', 'created_at')
            ->orderByDesc('poin')
            ->take(5)
            ->get();

        // Data grafik mingguan - 8 minggu terakhir
        $weeklyPlayerData = $this->getWeeklyPlayerData();
        
        return view('dashboard-admin', compact('admin', 'leaderboard', 'weeklyPlayerData'));
    }

    private function getWeeklyPlayerData()
    {
        $weeks = [];
        $playerCounts = [];
        
        // Ambil data 8 minggu terakhir
        for ($i = 7; $i >= 0; $i--) {
            $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();
            
            // Hitung jumlah player yang mendaftar dalam minggu ini
            $playerCount = User::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->count();
            
            $weeks[] = $startOfWeek->format('M d'); // Format: "Jan 15"
            $playerCounts[] = $playerCount;
        }
        
        return [
            'weeks' => $weeks,
            'player_counts' => $playerCounts
        ];
    }

    // Alternatif: Jika ingin menghitung player aktif per minggu
    private function getWeeklyActivePlayerData()
    {
        $weeks = [];
        $activeCounts = [];
        
        for ($i = 7; $i >= 0; $i--) {
            $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();
            
            // Hitung player yang aktif (misalnya yang punya aktivitas/poin dalam minggu ini)
            // Asumsi: ada tabel activity atau update terakhir di users
            $activeCount = User::where('updated_at', '>=', $startOfWeek)
                ->where('updated_at', '<=', $endOfWeek)
                ->count();
            
            $weeks[] = $startOfWeek->format('M d');
            $activeCounts[] = $activeCount;
        }
        
        return [
            'weeks' => $weeks,
            'active_counts' => $activeCounts
        ];
    }
}