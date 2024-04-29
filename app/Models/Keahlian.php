<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_keahlian';
    protected $table = 'keahlian';
    protected $fillable = [
        'id_keahlian', 
        'nama_keahlian',  
        'tipe_keahlian'
    ];

    public static function getData(){
        return self::get();
    }
}
