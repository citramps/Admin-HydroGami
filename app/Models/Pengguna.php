<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    // Relasi ke leaderboard
    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class, 'id_pengguna', 'id_pengguna');
    }
}
