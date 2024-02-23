<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $table = 'eskul';

    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'deskripsi',
        'pembina',
        'ketua',
        'status',
        'jadwal_mulai',
        'jadwal_selesai',
        'created_at',
        'riwayat_prestasi',
        'riwayat_lomba',
    ];

    public $timestamps = false;
}
