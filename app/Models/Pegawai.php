<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id_pegawai'];
    protected $primaryKey = 'id_pegawai';
    protected $table = 'pegawai';
    protected $fillable = [
        'nip',
        'nama_pegawai',
        'id_jabatan',
        'link_linkdIn',
        'instagram',
        'foto_profile'
    ];
    public function Jabatan(){
        return $this->hasOne(Jabatan::class, 'id_jabatan');
    }
}
