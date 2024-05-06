<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pembayaran';
    protected $table = 'pembayaran';
    protected $fillable = [
        'id_pembayaran', 
        'id_peserta',
        'no_rekening',
        'nominal',
        'bukti_pembayaran',
        'status',
    ];
    public static function getData(){
        return DB::table('pembayaran')->join('peserta', 'pembayaran.id_peserta', '=', 'peserta.id_peserta')->get();
    }
}
