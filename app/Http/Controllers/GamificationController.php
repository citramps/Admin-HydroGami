<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamificationController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return response()->json([
            'poin' => $user->poin, 
            'coin' => $user->coin,
            'level' => $user->level,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'poin' => 'nullable|integer|min:0',
            'coin' => 'nullable|integer|min:0',
            'level' => 'nullable|integer|min:1',
        ]);

        // Mapping field request ke kolom database
        $updateData = [];
        if (isset($validated['poin'])) {
            $updateData['poin'] = $validated['poin']; 
        }
        if (isset($validated['coin'])) {
            $updateData['coin'] = $validated['coin'];
        }
        if (isset($validated['level'])) {
            $updateData['level'] = $validated['level'];
        }

        $user->update($updateData);

        return response()->json([
            'message' => 'Gamification data updated!',
            'data' => [
                'poin' => $user->poin,
                'coin' => $user->coin,
                'level' => $user->level,
            ],
        ]);
    }
}