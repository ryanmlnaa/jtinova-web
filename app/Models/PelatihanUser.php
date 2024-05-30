<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanUser extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_users';

    protected $fillable = [
        'pelatihan_id',
        'user_id',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'pekerjaan',
        'foto',
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
