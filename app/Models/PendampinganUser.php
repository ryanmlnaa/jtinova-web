<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendampinganUser extends Model
{
    use HasFactory;
    protected $table = 'pendampingan_users';

    protected $fillable = [
        'user_id',
        'prodi_id',
        'nim',
        'judul',
        'dosen_pembimbing',
        'kendala',
        'skema_pendampingan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function skemaPendampingan()
    {
        return $this->belongsTo(SkemaPendampingan::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transactions::class);
    }
}
