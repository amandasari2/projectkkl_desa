<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'jenis_data',
        'file',
        'tgl_update',
    ];

    protected $table = 'data_desa';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
