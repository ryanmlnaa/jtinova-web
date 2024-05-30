<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = [
        'nama',  
    ];

    public function Pegawai(){
        return $this->belongsTo(Pegawai::class, 'jabatan_id');
    }
}
