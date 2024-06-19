<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbkmUser extends Model
{
    use HasFactory;
    
    protected $table = 'mbkm_users';
    protected $fillable = [
        'user_id',
        'prodi_id',
        'timeline_id',
        'nim',
        'semester',
        'golongan',
        'tahun_masuk',
        'no_hp',
        'photo',
        'khs',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function keahlian()
    {
        return $this->belongsToMany(Keahlian::class, 'mbkm_users_keahlian', 'mbkm_user_id', 'keahlian_id');
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }
}
