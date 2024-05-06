<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_peserta';
    protected $table = 'peserta';
    protected $fillable = [
        'id_peserta', 
        'nama_peserta',
        'email',
        'j_kel',
        'no_telp',
        'agama',
        'pekerjaan',
        'pendidikan_terakhir',
        'tmp_lahir',
        'tgl_lahir',
        'alamat',
        'foto_ktp',
        'status',
    ];
    public static function getData(){
        return self::all();
    }
}
