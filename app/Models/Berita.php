<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'gambar',
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;
}