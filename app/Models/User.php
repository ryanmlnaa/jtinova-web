<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use HasRoles;
use Spatie\Permission\Traits\HasRoles as TraitsHasRoles;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'password',
    ];

    public static function getData(){
        return self::get();
    }
}
