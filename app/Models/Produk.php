<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = [
        'nama_grub',
        'judul',
        'thumbnail',
        'slug',
        'deskripsi',
        'ss1',
        'ss2',
        'ss3',
 
    ];
}
