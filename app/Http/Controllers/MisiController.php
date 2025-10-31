<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MisiController extends Controller
{
    // ==============================
    // CRUD Misi (Admin)
    // ==============================

    // Tampilkan semua misi (untuk admin)
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

    // Simpan misi baru (manual)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_misi'      => 'required|string|max:255',
            'deskripsi_misi' => 'required|string',
            'status_misi'    => 'required|in:aktif,tidak aktif',
            'tipe_misi'      => 'required|in:harian,mingguan',
            'poin'           => 'required|integer|min:0',
        ]);

        $validated['id_admin'] = Auth::id();
        $validated['is_auto_generated'] = false;
        $validated['expiry_type'] = $validated['tipe_misi'] === 'mingguan' ? 'weekly' : 'daily';

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
        $validated['expiry_type'] = $validated['tipe_misi'] === 'mingguan' ? 'weekly' : 'daily';
        $mission->update($validated);

        return redirect()
            ->route('misi.index')
            ->with('success', 'Misi berhasil diperbarui!');
    }

    // Hapus misi (manual & auto)
    public function destroy($id_misi)
    {
        $mission = Misi::findOrFail($id_misi);

        if ($mission->is_auto_generated) {
            $mission->delete();
            return response()->json([
                'status'  => 'success',
                'message' => 'Misi otomatis berhasil dihapus!',
            ]);
        }

        $mission->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'Misi berhasil dihapus!',
        ]);
    }

    // ==============================
    // AUTO MISSION MANAGEMENT
    // ==============================

    // Hapus misi otomatis yang expired
    public function deleteExpiredAutoMissions()
    {
        try {
            $now = Carbon::now();

            $deletedCount = Misi::where('is_auto_generated', true)
                ->where(function ($query) use ($now) {
                    $query->where('expires_at', '<', $now)
                          ->orWhere('created_at', '<', $now->subDays(7));
                })
                ->delete();

            Log::info("Deleted {$deletedCount} expired auto missions");

            return response()->json([
                'success' => true,
                'message' => "Berhasil menghapus {$deletedCount} misi otomatis expired",
                'deleted_count' => $deletedCount,
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting expired auto missions: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus misi otomatis expired',
            ], 500);
        }
    }

    // Hapus semua misi otomatis (admin)
    public function deleteAllAutoMissions()
    {
        try {
            $deletedCount = Misi::where('is_auto_generated', true)->delete();

            Log::info("Deleted all {$deletedCount} auto missions");

            return response()->json([
                'success' => true,
                'message' => "Berhasil menghapus semua {$deletedCount} misi otomatis",
                'deleted_count' => $deletedCount,
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting all auto missions: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus misi otomatis',
            ], 500);
        }
    }

    // ==============================
    // API MISSION HANDLERS
    // ==============================

    // Ambil semua misi aktif (user)
    public function getAllMisi()
    {
        $now = Carbon::now();
        $this->cleanupAllExpiredMissions();

        $misi = Misi::where(function ($query) use ($now) {
                // Misi manual yang AKTIF
                $query->where(function ($q) {
                    $q->where('is_auto_generated', false)
                      ->where('status_misi', 'aktif');
                })
                // ATAU misi otomatis yang BELUM COMPLETED
                ->orWhere(function ($q) {
                    $q->where('is_auto_generated', true)
                      ->where('auto_completed', false);
                })
                // ATAU misi yang SUDAH SELESAI tapi BELUM EXPIRED
                ->orWhere(function ($q) use ($now) {
                    $q->where(function ($q2) {
                        // Misi manual selesai
                        $q2->where('is_auto_generated', false)
                           ->where('status_misi', 'selesai');
                    })->orWhere(function ($q2) {
                        // Misi otomatis completed
                        $q2->where('is_auto_generated', true)
                           ->where('auto_completed', true);
                    })
                    ->where('expires_at', '>=', $now);
                });
            })
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar misi aktif berhasil diambil',
            'data'    => $misi->map(function ($item) {
                return [
                    'id_misi'          => $item->id_misi,
                    'nama_misi'        => $item->nama_misi,
                    'deskripsi_misi'   => $item->deskripsi_misi,
                    'poin'             => $item->poin,
                    'status_misi'      => $item->status_misi,
                    'tipe_misi'        => $item->tipe_misi,
                    'admin'            => $item->admin->nama_admin ?? null,
                    'is_auto_generated'=> $item->is_auto_generated,
                    'parameter_type'   => $item->parameter_type,
                    'target_value'     => $item->target_value,
                    'auto_completed'   => $item->auto_completed,
                    'completed_at'     => $item->completed_at ? $item->completed_at->toISOString() : null,
                    'expires_at'       => $item->expires_at ? $item->expires_at->toISOString() : null,
                    'expiry_type'      => $item->expiry_type,
                ];
            }),
        ]);
    }

    // Ambil detail misi
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
            'data' => [
                'id_misi'         => $misi->id_misi,
                'nama_misi'       => $misi->nama_misi,
                'deskripsi_misi'  => $misi->deskripsi_misi,
                'poin'            => $misi->poin,
                'status_misi'     => $misi->status_misi,
                'tipe_misi'       => $misi->tipe_misi,
                'admin'           => $misi->admin->nama_admin ?? null,
                'tanggal_dibuat'  => $misi->created_at->format('d-m-Y H:i'),
                'is_auto_generated'=> $misi->is_auto_generated,
                'parameter_type'  => $misi->parameter_type,
                'target_value'    => $misi->target_value,
                'completed_at'    => $misi->completed_at?->toISOString(),
                'expires_at'      => $misi->expires_at?->toISOString(),
                'expiry_type'     => $misi->expiry_type,
            ],
        ]);
    }

    // Buat misi otomatis (admin/system)
    public function createAutoMission(Request $request)
    {
        $validated = $request->validate([
            'nama_misi'         => 'required|string|max:255',
            'deskripsi_misi'    => 'required|string',
            'poin'              => 'required|integer|min:0',
            'parameter_type'    => 'required|in:pH,TDS,temperature,humidity',
            'target_value'      => 'required|numeric',
            'trigger_condition' => 'required|in:above,below,range',
            'trigger_min_value' => 'nullable|numeric',
            'trigger_max_value' => 'nullable|numeric',
        ]);

        // Cegah duplikat
        $recentMission = Misi::where('parameter_type', $validated['parameter_type'])
            ->where('is_auto_generated', true)
            ->where('auto_completed', false)
            ->where('created_at', '>=', now()->subHours(6))
            ->first();

        if ($recentMission) {
            return response()->json([
                'success' => false,
                'message' => 'Sudah ada misi aktif untuk parameter ini dalam 6 jam terakhir.',
            ], 409);
        }

        $missionData = array_merge($validated, [
            'tipe_misi'         => 'harian',
            'status_misi'       => 'aktif',
            'is_auto_generated' => true,
            'expiry_type'       => 'daily',
            'id_admin'          => 1,
        ]);

        $mission = Misi::create($missionData);

        return response()->json([
            'success' => true,
            'message' => 'Misi otomatis berhasil dibuat',
            'data'    => $mission,
        ], 201);
    }

    // Lengkapi misi
     public function completeMission($id)
    {
        $mission = Misi::find($id);
        if (!$mission) {
            return response()->json(['success' => false, 'message' => 'Misi tidak ditemukan'], 404);
        }

        $now = Carbon::now();
        
        // Tentukan expiry time berdasarkan tipe misi
        if ($mission->tipe_misi === 'mingguan') {
            $expiresAt = $now->copy()->addWeek()->startOfDay();
            $expiryType = 'weekly';
        } else {
            $expiresAt = $now->copy()->addDay()->startOfDay();
            $expiryType = 'daily';
        }

        // Update data berdasarkan jenis misi
        if ($mission->is_auto_generated) {
            // Untuk misi OTOMATIS
            $mission->update([
                'auto_completed' => true,
                'status_misi'    => 'tidak aktif', // Nonaktifkan misi otomatis
                'completed_at'   => $now,
                'expires_at'     => $expiresAt,
                'expiry_type'    => $expiryType,
            ]);
        } else {
            // Untuk misi MANUAL
            $mission->update([
                'status_misi'    => 'selesai', // Ubah status ke selesai
                'completed_at'   => $now, // PASTIKAN completed_at di-set
                'expires_at'     => $expiresAt,
                'expiry_type'    => $expiryType,
                // auto_completed tetap false untuk misi manual
            ]);
        }

        Log::info("Mission completed", [
            'id' => $mission->id_misi,
            'name' => $mission->nama_misi,
            'type' => $mission->is_auto_generated ? 'auto' : 'manual',
            'completed_at' => $now,
            'expires_at' => $expiresAt
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Misi berhasil diselesaikan',
            'data'    => [
                'id'           => $mission->id_misi,
                'nama_misi'    => $mission->nama_misi,
                'is_auto_generated' => $mission->is_auto_generated,
                'completed'    => true,
                'completed_at' => $now->toISOString(),
                'expires_at'   => $expiresAt->toISOString(),
                'expiry_type'  => $expiryType,
            ],
        ]);
    }

    // Cleanup otomatis semua misi expired
    public function cleanupAllExpiredMissions()
    {
        try {
            $now = Carbon::now();
            $deletedCount = Misi::where('expires_at', '<', $now)
                ->where(fn($q) => $q->where('is_auto_generated', true)->orWhere('status_misi', 'selesai'))
                ->delete();

            Log::info("Auto-cleanup: {$deletedCount} misi expired dihapus");
            return $deletedCount;
        } catch (\Exception $e) {
            Log::error('Cleanup error: ' . $e->getMessage());
            return 0;
        }
    }

    // Manual cleanup endpoint
    public function cleanupAutoMissions()
    {
        try {
            $deletedCount = $this->cleanupAllExpiredMissions();
            return response()->json([
                'success' => true,
                'message' => "Cleanup berhasil, {$deletedCount} misi expired dihapus.",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal melakukan cleanup: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Reset misi mingguan
    public function resetWeeklyMissions()
    {
        try {
            $now = Carbon::now();
            $lastWeek = $now->copy()->subWeek();

            $resetCount = Misi::where('tipe_misi', 'mingguan')
                ->where('status_misi', 'aktif')
                ->where('is_auto_generated', false)
                ->where('created_at', '<', $lastWeek)
                ->update([
                    'status_misi' => 'tidak aktif',
                    'expires_at'  => $now->copy()->addDay()->startOfDay(),
                ]);

            Log::info("Weekly reset: {$resetCount} misi mingguan direset");

            return response()->json([
                'success' => true,
                'message' => 'Reset misi mingguan berhasil',
                'reset_count' => $resetCount,
            ]);
        } catch (\Exception $e) {
            Log::error('Weekly reset error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal reset misi mingguan',
            ], 500);
        }
    }
}
