<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceUser extends Model
{
    use HasFactory;
    
    protected $table = 'freelance_users';
    protected $fillable = [
        'user_id',
        'timeline_id',
        'status',
        'status_pendaftaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }
}
