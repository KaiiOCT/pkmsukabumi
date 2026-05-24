<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable = [
        'title_line1',
        'title_line2',
        'catchphrase',
        'location_label',
        'quote',
        'description',
        'duration',
        'group_size',
        'guide',
        'activity_type',
        'price',
        'price_strike',
        'slots_left',
        'status',
        'category',
        'included',
        'excluded',
        'main_image',
        'gallery',
        'itinerary',
        'is_bestseller',
    ];

    protected $casts = [
        'gallery' => 'array',
        'itinerary' => 'array',
        'is_bestseller' => 'boolean',
    ];
}