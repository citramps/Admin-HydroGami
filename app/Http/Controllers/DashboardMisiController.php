<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardMisiController extends Controller
{
    public function index()
    {
        $missions = [
            ['id' => 1, 'name' => 'Control Automatic', 'description' => 'Nyalakan Control Automatic...', 'stage' => 'TAHAP 1', 'points' => 300],
            ['id' => 2, 'name' => 'Control AB MIX', 'description' => 'Pastikan kadar nutrisi...', 'stage' => 'TAHAP 2', 'points' => 400],
            ['id' => 3, 'name' => 'Control Water', 'description' => 'Tekan tombol Water...', 'stage' => 'TAHAP 3', 'points' => 500],
            ['id' => 4, 'name' => 'Control pH UP dan pH Down', 'description' => 'Lakukan pengecekan pada...', 'stage' => 'TAHAP 4', 'points' => 600],
        ];

        return view('missions.index', compact('missions'));
    }

    public function create()
    {
        return view('missions.create');
    }
}
