<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'featured_image',
        'slug',
        'active',
        'published_at'
    ];

    protected $table = 'projects';

}
