<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles, Notifiable;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'pekerjaan',
        'foto',
        'email_verified_at',
    ];

    public function mbkmUser()
    {
        return $this->hasOne(MbkmUser::class);
    }

    public function pendampinganUser()
    {
        return $this->hasOne(PendampinganUser::class);
    }

    public function pelatihanUser()
    {
        return $this->hasMany(PelatihanUser::class);
    }

    public function instrukturUser()
    {
        return $this->hasOne(InstrukturUser::class);
    }
}
