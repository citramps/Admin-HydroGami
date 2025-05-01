<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    // Definisikan nama tabel
    protected $table = 'notifikasi';

    // Definisikan primary key
    protected $primaryKey = 'id_notifikasi';

    // Definisikan kolom yang bisa diisi
    protected $fillable = [
        'id_sensor',
        'jenis_sensor',
        'pesan',
        'status',
        'dibaca',
        'waktu_dibuat'
    ];

    // Set timestamp fields
    const CREATED_AT = 'waktu_dibuat';
    const UPDATED_AT = null; // Karena tidak ada kolom updated_at

    // Relasi dengan tabel sensor_data
    public function sensorData()
    {
        return $this->belongsTo(SensorData::class, 'id_sensor', 'id');
    }
}
