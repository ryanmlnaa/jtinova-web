<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'portfolio_images';
    
    protected $fillable = ['portfolio_id', 'image_url', 'is_primary'];

    public function portfolio()
    {
        return $this->belongsTo(Portofolio::class, 'portfolio_id');
    }

}
