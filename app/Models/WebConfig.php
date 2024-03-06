<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    use HasFactory;
    protected $table = 'webconfig';
    protected $fillable = [
        'name',
        'alias',
        'brand_logo',
        'video',
        'video_preview',
        'introduction',
        'profil_link',
        'map',
        'location',
        'open_hours',
        'email',
        'phone',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'stamp',
        'signature',
        'manager',
        'nip',
    ];
}
