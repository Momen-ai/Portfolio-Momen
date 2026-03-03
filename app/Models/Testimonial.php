<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'position',
        'feedback',
        'rating',
        'client_image'
    ];
}

