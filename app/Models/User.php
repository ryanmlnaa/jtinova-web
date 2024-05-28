<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles;
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

    public function mbkmUser()
    {
        return $this->hasOne(MbkmUser::class);
    }
}
