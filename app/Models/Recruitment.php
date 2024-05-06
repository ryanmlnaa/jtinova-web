<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_recruitment';
    protected $table = 'recruitment';
    protected $fillable = [
        'id_recruitment', 
        'nim',
        'nama',
        'prodi',
        'semester',
        'keahlian_utama',
        'keahlian_lain'  
    ];
    public static function getData(){
        return self::all();
    }
}
