<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    use HasFactory;
    protected $table = 'keahlian';
    protected $fillable = [
        'nama',  
    ];

    public function mbkmUser()
    {
        return $this->belongsToMany(MbkmUser::class, 'mbkm_users_keahlian', 'keahlian_id', 'mbkm_user_id');
    }
}
