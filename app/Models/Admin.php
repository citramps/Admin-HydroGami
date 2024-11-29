<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $attributes = [
        'role' => 'Admin HydroGami',
    ];

    protected $fillable = [
        'username',
        'email',
        'password',
        'foto_profil',
    ];

    public function missions()
    {
        return $this->hasMany(Misi::class, 'id_admin');
    }

    public function panduan()
    {
        return $this->hasMany(Panduan::class, 'id_admin');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
