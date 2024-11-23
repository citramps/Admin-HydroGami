<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisiController extends Controller
{
    public function index()
    {
        $missions = Misi::all();

        return view('misi.index', compact('missions'));
    }

    public function create()
    {
        return view('misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_misi' => 'required|string|max:255',
            'deskripsi_misi' => 'required|string',
            'status_misi' => 'required|string|in:aktif,tidak aktif',
            'poin' => 'required|integer|min:0',
        ]);

        $idAdmin = Auth::id();

        Misi::create([
            'id_admin' => $idAdmin,
            'nama_misi' => $request->nama_misi,
            'deskripsi_misi' => $request->deskripsi_misi,
            'status_misi' => $request->status_misi,
            'poin' => $request->poin,
        ]);

        return redirect()->route('misi.index')->with('success', 'Misi berhasil ditambahkan!');
    }

    public function edit($id_misi)
    {
        $mission = Misi::findOrFail($id_misi);

        return view('misi.edit', compact('mission'));
    }

    public function update(Request $request, $id_misi)
    {
        $request->validate([
            'nama_misi' => 'required|string|max:255',
            'deskripsi_misi' => 'required|string',
            'status_misi' => 'required|string|in:aktif,tidak aktif',
            'poin' => 'required|integer|min:0',
        ]);

        $mission = Misi::findOrFail($id_misi);

        $mission->nama_misi = $request->input('nama_misi');
        $mission->deskripsi_misi = $request->input('deskripsi_misi');
        $mission->status_misi = $request->input('status_misi');
        $mission->poin = $request->input('poin');
        $mission->save();

        return redirect()->route('misi.index')->with('success', 'Misi berhasil diperbarui!');
    }

    public function destroy($id_misi)
    {
        $mission = Misi::findOrFail($id_misi);
        $mission->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Misi berhasil dihapus!'
        ]);
    }
}
