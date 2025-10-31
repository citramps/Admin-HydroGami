<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;

    protected $table = 'misi';
    protected $primaryKey = 'id_misi';

    protected $fillable = [
        'id_admin',
        'nama_misi',
        'deskripsi_misi',
        'status_misi',
        'tipe_misi', 
        'poin',
        'is_auto_generated',
        'parameter_type',
        'target_value',
        'trigger_condition',
        'trigger_min_value',
        'trigger_max_value',
        'auto_completed',
        'completed_at', // TAMBAHKAN INI
        'expires_at',   // TAMBAHKAN INI
        'expiry_type'   // TAMBAHKAN INI
    ];

    protected $casts = [
        'is_auto_generated' => 'boolean',
        'auto_completed' => 'boolean',
        'target_value' => 'decimal:2',
        'trigger_min_value' => 'decimal:2', 
        'trigger_max_value' => 'decimal:2',
        'completed_at' => 'datetime',
        'expires_at' => 'datetime'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function scopeAuto($query) {
        return $query->where('is_auto_generated', true);
    }
    
    public function scopeManual($query) {
        return $query->where('is_auto_generated', false);
    }

    // Helper method untuk cek status
    public function getIsCompletedAttribute()
    {
        if ($this->is_auto_generated) {
            return $this->auto_completed;
        } else {
            return $this->status_misi === 'selesai';
        }
    }
}