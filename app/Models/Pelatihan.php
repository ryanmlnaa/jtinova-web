<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihan';
    protected $fillable = [
        'id_kategori',
        'nama',
        'deskripsi',
        'benefit',
        'harga',
        'foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }
}
