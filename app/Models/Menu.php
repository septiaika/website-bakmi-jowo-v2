<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menus';

    protected $fillable = [
        'nama_menu',
        'harga',
        'deskripsi',
        'foto',
        'kategori'
    ];
}