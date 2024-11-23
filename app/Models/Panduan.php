<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;

    protected $table = 'panduan';
    protected $primaryKey = 'id_panduan';
    public $timestamps = false;

    protected $fillable = [
        'id_admin',
        'judul',
        'desk_panduan',
        'gambar',
        'video',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
