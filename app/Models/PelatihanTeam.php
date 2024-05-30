<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanTeam extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_teams';

    protected $fillable = [
        'pelatihan_id',
        'nama'
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'pelatihan_id', 'id');
    }

    public function pelatihanUsers()
    {
        return $this->hasMany(PelatihanUser::class, 'pelatihan_team_id', 'id');
    }
}
