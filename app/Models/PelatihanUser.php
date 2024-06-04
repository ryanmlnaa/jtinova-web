<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanUser extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_users';

    protected $fillable = [
        'pelatihan_team_id',
        'user_id',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'pekerjaan',
        'foto',
    ];

    public function team()
    {
        return $this->belongsTo(PelatihanTeam::class, 'pelatihan_team_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
