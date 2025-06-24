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
            'id_admin' => Auth::id(),
            'tipe_reward' => $request->tipe_reward,
            'subtipe_gacha' => $request->tipe_reward === 'gacha' ? $request->subtipe_gacha : null,
            'koin_dibutuhkan' => $request->tipe_reward === 'redeem' ? $request->koin_dibutuhkan : null,
            'jumlah' => $this->resolveJumlah($request),
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
            'tipe_reward' => $request->tipe_reward,
            'subtipe_gacha' => $request->tipe_reward === 'gacha' ? $request->subtipe_gacha : null,
            'koin_dibutuhkan' => $request->tipe_reward === 'redeem' ? $request->koin_dibutuhkan : null,
            'jumlah' => $this->resolveJumlah($request),
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

    private function validateRequest(Request $req)
    {
        $req->validate([
            'tipe_reward' => ['required', Rule::in(['gacha','redeem'])],
            'subtipe_gacha' => [
                Rule::requiredIf($req->tipe_reward === 'gacha'),
                'nullable',
                Rule::in(['exp','coin','zonk']),
            ],
            'koin_dibutuhkan' => [
                Rule::requiredIf($req->tipe_reward === 'redeem'),
                'nullable',
                'integer',
                'min:1',
            ],
            'jumlah' => [
                Rule::requiredIf(
                    $req->tipe_reward === 'redeem' ||
                    ($req->tipe_reward === 'gacha' && $req->subtipe_gacha !== 'zonk')
                ),
                'nullable',
                'integer',
                'min:0',
            ],
        ], [
            'subtipe_gacha.required' => 'Pilih sub-tipe gacha',
            'koin_dibutuhkan.required' => 'Koin yang dibutuhkan wajib diisi untuk reward redeem',
            'jumlah.required' => 'Jumlah wajib diisi (kecuali zonk)',
        ]);
    }

    private function resolveJumlah(Request $req)
    {
        // zonk → null, lainnya ambil input
        return ($req->tipe_reward === 'gacha' && $req->subtipe_gacha === 'zonk')
               ? null
               : $req->jumlah;
    }

    // Untuk API
    public function apiIndex()
    {
        $rewards = Reward::all();
        return response()->json([
            'success' => true,
            'data' => $rewards
        ]);
    }

    public function apiGachaRewards()
{
    $rewards = Reward::where('tipe_reward', 'gacha')->get();
    return response()->json([
        'success' => true,
        'data' => $this->transformGachaRewards($rewards)
    ]);
}

public function apiRedeemRewards()
{
    $rewards = Reward::where('tipe_reward', 'redeem')->get();
    return response()->json([
        'success' => true,
        'data' => $rewards->map(function ($reward) {
            return [
                'id' => $reward->id_reward,
                'type' => $reward->tipe_reward,
                'amount' => $reward->jumlah,
                'koin_dibutuhkan' => $reward->koin_dibutuhkan,
                'label' => 'Rp ' . number_format($reward->jumlah, 0, ',', '.'),
            ];
        })
    ]);
}

    private function transformGachaRewards($rewards)
    {
        return $rewards->map(function ($reward) {
            return [
                'id' => $reward->id_reward,
                'type' => $reward->tipe_reward,
                'subtype' => $reward->subtipe_gacha,
                'amount' => $reward->jumlah,
                'label' => $reward->subtipe_gacha === 'zonk' 
                    ? 'ZONK!' 
                    : $reward->jumlah . ' ' . strtoupper($reward->subtipe_gacha),
                'color' => $this->getColorForReward($reward->subtipe_gacha)
            ];
        });
    }

    private function getColorForReward($subtype)
    {
        switch ($subtype) {
            case 'exp': return '#4CAF50'; // Hijau
            case 'coin': return '#FFC107'; // Kuning
            case 'zonk': return '#F44336'; // Merah
            default: return '#2196F3'; // Biru
        }
    }
}