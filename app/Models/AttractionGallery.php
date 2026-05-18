<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttractionGallery extends Model
{
    protected $fillable = [
        'attraction_id',
        'image',
        'caption',
    ];

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }
}