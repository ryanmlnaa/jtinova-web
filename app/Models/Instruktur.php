<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_instruktur';
    protected $table = 'instruktur';
    protected $fillable = [
        'id_instruktur', 
        'nama_instruktur',
        'email',
        'no_telp',
        'agama',
        'pekerjaan',
        'pendidikan_terakhir',
        'tmp_lahir',
        'tgl_lahir',
        'alamat',
        'bidang_keahlian',
        'foto_ktp',
        'portofolio',
        // 'status',
    ];
    public static function getData(){
        return self::all();
    }
}
