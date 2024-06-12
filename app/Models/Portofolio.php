<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portofolio extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'portofolio';
    protected $fillable = [
        'judul',
        'slug',
        'category_id',
        'deskripsi',
        'gambar',
        'klien',
        'start_date',
        'end_date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($portofolio) {
            $portofolio->slug = Str::slug($portofolio->judul);
        });

        static::updating(function ($portofolio) {
            $portofolio->slug = Str::slug($portofolio->judul);
        });
    }

    public static function getData()
    {
        return self::all();
    }

    public function images()
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
