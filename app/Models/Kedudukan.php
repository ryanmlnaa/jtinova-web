<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedudukan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kedudukan';
    protected $table = 'kedudukan';
    protected $fillable = [
        'id_kedudukan', 
        'nama_kedudukan',  
    ];

    public function Pegawai(){
        return $this->belongsTo(Pegawai::class, 'kedudukan_id');
    }
}
