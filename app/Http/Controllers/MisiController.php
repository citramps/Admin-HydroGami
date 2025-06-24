<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisiController extends Controller
{


    // Tampilkan semua misi
    public function index()
    {
        $missions = Misi::all();
        return view('misi.index', compact('missions'));
    }

    // Form tambah misi
    public function create()
    {
        return view('misi.create');
    }

    // Simpan misi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_misi'      => 'required|string|max:255',
            'deskripsi_misi' => 'required|string',
            'status_misi'    => 'required|in:aktif,tidak aktif',
            'tipe_misi'      => 'required|in:harian,mingguan',
            'poin'           => 'required|integer|min:0',
        ]);

        $validated['id_admin'] = Auth::id();           // admin yang sedang login
        Misi::create($validated);

        return redirect()
            ->route('misi.index')
            ->with('success', 'Misi berhasil ditambahkan!');
    }

    // Form edit misi
    public function edit($id_misi)
    {
        $mission = Misi::findOrFail($id_misi);
        return view('misi.edit', compact('mission'));
    }

    // Update misi
    public function update(Request $request, $id_misi)
    {
        $validated = $request->validate([
            'nama_misi'      => 'required|string|max:255',
            'deskripsi_misi' => 'required|string',
            'status_misi'    => 'required|in:aktif,tidak aktif',
            'tipe_misi'      => 'required|in:harian,mingguan',
            'poin'           => 'required|integer|min:0',
        ]);

        $mission = Misi::findOrFail($id_misi);
        $mission->update($validated);

        return redirect()
            ->route('misi.index')
            ->with('success', 'Misi berhasil diperbarui!');
    }

    // Hapus misi (dipanggil via Ajax)
    public function destroy($id_misi)
    {
        Misi::findOrFail($id_misi)->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Misi berhasil dihapus!',
        ]);
    }


    // GET /api/user/misi  → hanya misi aktif
    public function getAllMisi()
    {
        $misi = Misi::where('status_misi', 'aktif')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar misi aktif berhasil diambil',
            'data'    => $misi->map(function ($item) {
                return [
                    'id_misi'       => $item->id_misi,
                    'nama_misi'     => $item->nama_misi,
                    'deskripsi_misi'=> $item->deskripsi_misi,
                    'poin'          => $item->poin,
                    'status_misi'   => $item->status_misi,
                    'tipe_misi'     => $item->tipe_misi,
                    'admin'         => $item->admin->nama_admin ?? null, 
                ];
            }),
        ], 200);
    }

    // GET /api/user/misi/{id}
    public function getMisiDetail($id)
    {
        $misi = Misi::with('admin')->find($id);

        if (!$misi) {
            return response()->json([
                'success' => false,
                'message' => 'Misi tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail misi berhasil diambil',
            'data'    => [
                'id_misi'       => $misi->id_misi,
                'nama_misi'     => $misi->nama_misi,
                'deskripsi_misi'=> $misi->deskripsi_misi,
                'poin'          => $misi->poin,
                'status_misi'   => $misi->status_misi,
                'tipe_misi'     => $misi->tipe_misi,
                'admin'         => $misi->admin->nama_admin ?? null,
                'tanggal_dibuat'=> $misi->created_at->format('d-m-Y H:i'),
            ],
        ], 200);
    }
}