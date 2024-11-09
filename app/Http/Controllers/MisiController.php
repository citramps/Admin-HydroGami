<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class MisiController extends Controller
{
    public function index()
    {
        $missions = [
            ['id' => 1, 'name' => 'Control Automatic', 'description' => 'Nyalakan Control Automatic untuk mengatur sistem secara otomatis.', 'stage' => 'Tahap 1', 'points' => 300],
            ['id' => 2, 'name' => 'Control AB MIX', 'description' => 'Pastikan kadar nutrisi yang tepat dengan menekan tombol AB Mix.', 'stage' => 'Tahap 2', 'points' => 400],
            ['id' => 3, 'name' => 'Control Water', 'description' => 'Tekan tombol Water untuk memulai aliran air dan pastikan sirkulasi yang baik bagi tanaman.', 'stage' => 'Tahap 3', 'points' => 500],
            ['id' => 4, 'name' => 'Control pH UP dan pH Down', 'description' => 'Lakukan pengecekan pada pH dengan menggunakan tombol pH UP atau pH DOWN sesuai kondisi air.', 'stage' => 'Tahap 4', 'points' => 600],
        ];

        return view('missions.index', compact('missions'));
    }

    public function create()
    {
        return view('missions.create');
    }

    public function edit($id)
    {
        $mission = [
            'id' => $id,
            'name' => 'Control Automatic',
            'description' => 'Nyalakan Control Automatic untuk mengatur sistem secara otomatis.',
            'stage' => 'Tahap 1',
            'points' => '300 Exp'
        ];

        return view('missions.edit', compact('mission'));
    }
}
