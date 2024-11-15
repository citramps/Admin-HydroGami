<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Misi;
use Illuminate\Http\Request;

class MisiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $missions = Misi::all();

        return view('missions.index', compact('user', 'missions'));
    }

    public function create()
    {
        return view('missions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mission_number' => 'required',
            'mission_name' => 'required',
            'mission_description' => 'required',
            'mission_stage' => 'required',
            'mission_points' => 'required|integer',
        ]);

        Misi::create([
            'no_misi' => $request->mission_number,
            'nama_misi' => $request->mission_name,
            'deskripsi_misi' => $request->mission_description,
            'tahap_misi' => $request->mission_stage,
            'poin' => $request->mission_points,
        ]);

        return redirect()->route('misi.index')->with('success', 'Misi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mission = Misi::findOrFail($id);

        return view('missions.edit', compact('mission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_misi' => 'required|string|max:255',
            'deskripsi_misi' => 'required|string',
            'tahap_misi' => 'required|string|max:50',
            'poin' => 'required|integer|min:0',
        ]);

        $mission = Misi::findOrFail($id);
        $mission->nama_misi = $request->input('nama_misi');
        $mission->deskripsi_misi = $request->input('deskripsi_misi');
        $mission->tahap_misi = $request->input('tahap_misi');
        $mission->poin = $request->input('poin');
        $mission->save();

        return redirect()->route('misi.index')->with('success', 'Misi berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $mission = Misi::findOrFail($id);
        $mission->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Misi berhasil dihapus!'
        ]);
    }
}
