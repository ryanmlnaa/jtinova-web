<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanTeam extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_teams';

    protected $fillable = [
        'nama',
        'jumlah_anggota',
    ];

    public function pelatihanUsers()
    {
        return $this->hasMany(PelatihanUser::class, 'pelatihan_team_id', 'id');
    }
}
