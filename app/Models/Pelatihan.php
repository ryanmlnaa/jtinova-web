<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pelatihan';
    protected $table = 'pelatihan';
    protected $fillable = [
        'id_pelatihan', 
        'nama_pelatihan',
        'kategori',
        'deskripsi',
        'benefit',
        'harga',
        'foto'
    ];
    public static function getData(){
        return self::all();
    }
}
