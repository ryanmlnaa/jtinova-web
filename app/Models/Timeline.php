<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'jenis',
        'timeline',
        'tahun_ajaran',
        'status',
    ];

    public function MbkmUser()
    {
        return $this->hasMany(MbkmUser::class);
    }

    public function InstrukturUser()
    {
        return $this->hasMany(InstrukturUser::class);
    }

    public function FreelanceUser()
    {
        return $this->hasMany(FreelanceUser::class);
    }
}
