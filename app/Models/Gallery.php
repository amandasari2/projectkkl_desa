<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galery';

    protected $fillable = [
        'foto',
        'title',
        'keterangan',
    ];


    protected $primaryKey = 'id';

    public $timestamps = false;
}