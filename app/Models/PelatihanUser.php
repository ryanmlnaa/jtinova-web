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
        'pelatihan_id',
        'user_id',
    ];

    public function team()
    {
        return $this->belongsTo(PelatihanTeam::class, 'pelatihan_team_id', 'id');
    }

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transactions::class, 'pelatihan_user_id');
    }
}
