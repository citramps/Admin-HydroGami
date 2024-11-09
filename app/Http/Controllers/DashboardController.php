<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index()
        {
            // Sample data
            $players = [
                ['name' => 'Rebecca Max', 'points' => 800, 'plant' => 'Pakcoy', 'difficulty' => 'Easy'],
                ['name' => 'Cordell Edwards', 'points' => 500, 'plant' => 'Pakcoy', 'difficulty' => 'High'],
                ['name' => 'Derrick Spencer', 'points' => 400, 'plant' => 'Pakcoy', 'difficulty' => 'Medium'],
                ['name' => 'Larissa Burton', 'points' => 300, 'plant' => 'Pakcoy', 'difficulty' => 'Easy'],
                ['name' => 'Rebecca Max', 'points' => 200, 'plant' => 'Pakcoy', 'difficulty' => 'Easy'],
            ];
    
            return view('dashboard', compact('players'));
        }
}
