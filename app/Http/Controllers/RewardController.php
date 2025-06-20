<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RewardController extends Controller
{
    // Menampilkan semua reward

     public function index()
    {
        $rewards = Reward::all();
        return view('reward.index', compact('rewards'));
    }

    // Form tambah reward
    public function create()
    {
        return view('reward.create');
    }

    // Simpan reward baru
     public function store(Request $request)
    {
        $this->validateRequest($request);

        $data = [
            'id_admin'      => Auth::id(),
            'tipe_reward'   => $request->tipe_reward,
            'subtipe_gacha' => $request->tipe_reward === 'gacha' ? $request->subtipe_gacha : null,
            'jumlah'        => $this->resolveJumlah($request),
        ];

        Reward::create($data);

        return redirect()->route('reward.index')
                         ->with('success', 'Reward berhasil ditambahkan!');
    }

    // Form edit reward
    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        return view('reward.edit', compact('reward'));
    }

    // Update reward
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $reward = Reward::findOrFail($id);
        $reward->update([
            'tipe_reward'   => $request->tipe_reward,
            'subtipe_gacha' => $request->tipe_reward === 'gacha' ? $request->subtipe_gacha : null,
            'jumlah'        => $this->resolveJumlah($request),
        ]);

        return redirect()->route('reward.index')
                         ->with('success', 'Reward berhasil diperbarui!');
    }

    // Hapus reward
    public function destroy($id)
    {
        Reward::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Reward berhasil dihapus!',
        ]);
    }

     /* ---------- HELPER ---------- */
    private function validateRequest(Request $req)
    {
        $req->validate([
            'tipe_reward'   => ['required', Rule::in(['gacha','redeem'])],
            'subtipe_gacha' => [
                Rule::requiredIf($req->tipe_reward === 'gacha'),
                'nullable',
                Rule::in(['exp','coin','zonk']),
            ],
            'jumlah'        => [
                Rule::requiredIf(
                    $req->tipe_reward === 'redeem' ||
                    ($req->tipe_reward === 'gacha' && $req->subtipe_gacha !== 'zonk')
                ),
                'nullable','integer','min:0',
            ],
        ],[
            'subtipe_gacha.required' => 'Pilih sub‑tipe gacha',
            'jumlah.required'        => 'Jumlah wajib diisi (kecuali zonk)',
        ]);
    }

    private function resolveJumlah(Request $req)
    {
        // zonk → null, lainnya ambil input
        return ($req->tipe_reward === 'gacha' && $req->subtipe_gacha === 'zonk')
               ? null
               : $req->jumlah;
    }
}
