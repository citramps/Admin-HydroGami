<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index()
        {
            // Sample data
            $players = [
                ['name' => 'Rebecca Max', 'points' => 800, 'plant' => 'Pakcoy', 'difficulty' => 'Easy', 'profile_image' => '/path/to/rebecca-max.jpg'],
                ['name' => 'Cordell Edwards', 'points' => 500, 'plant' => 'Pakcoy', 'difficulty' => 'High', 'profile_image' => '/path/to/rebecca-max.jpg'],
                ['name' => 'Derrick Spencer', 'points' => 400, 'plant' => 'Pakcoy', 'difficulty' => 'Medium', 'profile_image' => '/path/to/rebecca-max.jpg'],
                ['name' => 'Larissa Burton', 'points' => 300, 'plant' => 'Pakcoy', 'difficulty' => 'Easy', 'profile_image' => '/path/to/rebecca-max.jpg'],
            ];
    
            return view('dashboard', compact('players'));
        }
}
