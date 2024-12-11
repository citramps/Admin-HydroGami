<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $fillable = [
        'temperature',
        'humidity',
        'light',
        'soil_moisture',
        'tds',
        'ph',
    ];

    use HasFactory;
}
