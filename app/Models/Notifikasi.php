<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;

class Notifikasi extends DatabaseNotification
{
    // Jika kamu ingin eksplisit
    protected $table = 'notifikasi';

    // Jika ingin menentukan kolom yang boleh diisi secara manual
    protected $fillable = [
        'id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
        'created_at',
        'updated_at',
    ];

    // Jika kamu ingin relasi ke user (asumsi notifiable_type = 'App\Models\User')
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'notifiable_id');
    }

    // Akses data notifikasi sebagai array (jika data disimpan dalam format json)
    public function getDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = is_array($value) ? json_encode($value) : $value;
    }
}
