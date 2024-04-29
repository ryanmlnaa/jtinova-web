<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_benefit';
    protected $table = 'benefit';
    protected $fillable = [
        'id_benefit', 
        'nama_benefit',  
    ];

    public static function getData(){
        return self::get();
    }
    
}
