<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderSlider extends Model
{
    protected $table = 'header_slider';

    protected $fillable = [
        'h1_title',
        'h2_title',
        'subtitle',
        'cta_link',
        'cta_name',
        'images',
        'effect',
        'is_active'
    ];


    protected $casts = [
        'images' => 'json'
    ];
}
