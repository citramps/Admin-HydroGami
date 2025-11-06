<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PumpControlLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username', 
        'pump_name',
        'old_value',
        'new_value',
        'action'
    ];

    protected $casts = [
        'old_value' => 'integer',
        'new_value' => 'integer',
        'created_at' => 'datetime'
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk filter
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    public function scopeByPump($query, $pumpName)
    {
        return $query->where('pump_name', $pumpName);
    }

    public function scopeByUsername($query, $username)
    {
        return $query->where('username', 'like', '%' . $username . '%');
    }

    public function scopeByAction($query, $action)
    {
        return $query->where('action', $action);
    }
}