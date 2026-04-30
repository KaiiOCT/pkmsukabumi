<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'order_id',
    'name',
    'phone',
    'email',
    'package_name',
    'package_price',
    'date',
    'pax',
    'message',
    'status'
    ];
}
