<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'foto_pd',
    ];

    protected $table = 'struktur';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
