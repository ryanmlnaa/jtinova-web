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
        'kode',
        'nama',
        'deskripsi',
        'benefit',
        'harga',
        'foto',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'kuota',
        'kuota_tim',
        'status',
        'syllabus_link'
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    public function pelatihanUsers()
    {
        return $this->hasMany(PelatihanUser::class, 'pelatihan_id');
    }
}
