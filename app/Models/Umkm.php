<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkms';

    protected $fillable = [
        'name',
        'owner_highlight',
        'slogan',
        'category',
        'description',

        'is_open',
        'open_time',
        'close_time',
        'price_start',

        'address',
        'gmaps_url',
        'whatsapp',

        'main_image',

        'gallery',
        'menu',
    ];

    protected $casts = [
        'is_open'    => 'boolean',
        'gallery'    => 'array',
        'menu'       => 'array',
        'open_time'  => 'datetime:H:i',
        'close_time' => 'datetime:H:i',
    ];
}