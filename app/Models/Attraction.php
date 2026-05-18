<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [

        'name',
        'slug',
        'excerpt',
        'description',
        'category',

        'location_label',
        'special_badge',

        'operational_days',
        'open_time',
        'close_time',

        'ticket_price',

        'facilities',

        'google_maps_url',

        'main_image',
    ];

    public function galleries()
    {
        return $this->hasMany(AttractionGallery::class);
    }
}

