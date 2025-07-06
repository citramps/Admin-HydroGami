<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $primaryKey = 'id_reward';
    public $timestamps = true;

    protected $fillable = [
        'tipe_reward',
        'subtipe_gacha',
        'koin_dibutuhkan',
        'jumlah',
        'nama_reward',
        'id_admin',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}