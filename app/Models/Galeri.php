<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeri extends Model
{
    use SoftDeletes;

    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'foto',
        'deskripsi',
    ];
}