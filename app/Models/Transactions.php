<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'pelatihan_user_id',
        'pendampingan_user_id',
        'invoice',
        'status',
        'payment_method',
        'payment_proof',
    ];

    public function pelatihanUser()
    {
        return $this->belongsTo(PelatihanUser::class, 'pelatihan_user_id');
    }

    public function pendampinganUser()
    {
        return $this->belongsTo(PendampinganUser::class, 'pendampingan_user_id');
    }
}
