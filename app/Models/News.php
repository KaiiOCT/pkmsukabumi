<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'status',
        'is_featured',
        'excerpt',
        'content',
        'image',
        'image_caption',
        'quote_text',
        'quote_author',
        'has_event',
        'event_date',
        'event_time',
        'event_location',
        'event_price',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'has_event'   => 'boolean',
        'published_at' => 'datetime',
    ];
}