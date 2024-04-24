<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_portofolio';
    protected $table = 'portofolio';
    protected $fillable = [
        'id_portofolio', 
        'judul',
        'kategori',
        'deskripsi',
        'klien',
        'foto',
        'start_date',
        'end_date'  
    ];
    public static function getData(){
        return self::all();
    }
}
