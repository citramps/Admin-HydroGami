<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PanduanController extends Controller
{
    public function index()
    {
        $panduan = Panduan::all();
        return view('panduan.index', compact('panduan'));
    }

    public function create()
    {
        return view('panduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'desk_panduan' => 'nullable|string',
            'gambar' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'required|url',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('panduan_images', 'public');
        }

        $idAdmin = Auth::id();

        Panduan::create([
            'id_admin' => $idAdmin,
            'judul' => $request->judul,
            'desk_panduan' => $request->desk_panduan,
            'gambar' => $gambarPath,
            'video' => $request->video,
        ]);

        return redirect()->route('panduan.index')->with('success', 'Panduan berhasil ditambahkan!');
    }

    public function edit($id_panduan)
    {
        $panduan = Panduan::findOrFail($id_panduan);
        return view('panduan.edit', compact('panduan'));
    }

    public function update(Request $request, $id_panduan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'desk_panduan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|url',
        ]);

        $panduan = Panduan::findOrFail($id_panduan);

        $panduan->judul = $request->input('judul');
        $panduan->desk_panduan = $request->input('desk_panduan');

        if ($request->hasFile('gambar')) {
            if ($panduan->gambar && Storage::disk('public')->exists($panduan->gambar)) {
                Storage::disk('public')->delete($panduan->gambar);
            }

            $panduan->gambar = $request->file('gambar')->store('panduan_images', 'public');
        }

        $panduan->video = $request->input('video');
        $panduan->save();

        return redirect()->route('panduan.index')->with('success', 'Panduan berhasil diperbarui!');
    }

    public function destroy($id_panduan)
    {
        $panduan = Panduan::findOrFail($id_panduan);

        if ($panduan->gambar && Storage::exists($panduan->gambar)) {
            Storage::delete($panduan->gambar);
        }

        $panduan->delete();

        return response()->json(['message' => 'Panduan berhasil dihapus']);
    }


    //USER API
    public function getAllPanduan()
    {
        $panduan = Panduan::all();

        // Format respon JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar panduan berhasil diambil.',
            'data' => $panduan
        ], 200);
    }

    public function getPanduanDetail($id)
    {
        $panduan = Panduan::find($id);

        if ($panduan) {
            return response()->json([
                'success' => true,
                'message' => 'Detail panduan berhasil diambil.',
                'data' => $panduan
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Panduan tidak ditemukan.'
            ], 404);
        }
    }
}
