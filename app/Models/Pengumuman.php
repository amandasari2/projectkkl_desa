<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman'; 

    protected $fillable = [
        'title',
        'tanggal',
        'deskripsi',
        'gambar',
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;
}
