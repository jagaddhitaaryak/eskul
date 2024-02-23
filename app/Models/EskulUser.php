<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EskulUser extends Model
{
    use HasFactory;

    protected $table = 'user_eskul';

    protected $fillable = [
        'id',
        'user',
        'eskul',
        'status',
        'alasan',
        'periode',
        'nilai'
    ];

    public $timestamps = false;
}
