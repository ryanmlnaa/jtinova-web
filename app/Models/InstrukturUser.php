<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrukturUser extends Model
{
    use HasFactory;
    
    protected $table = 'instruktur_users';

    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'timeline_id',
        'status_pendaftaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }
}
