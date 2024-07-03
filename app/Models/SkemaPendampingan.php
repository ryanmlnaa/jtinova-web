<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaPendampingan extends Model
{
    use HasFactory;
    protected $table = 'skema_pendampingans';
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'harga',
        'foto',
        'status',
    ];

    public function pendampinganUsers()
    {
        return $this->hasMany(PendampinganUser::class, 'skema_pendampingan_id');
    }
}
