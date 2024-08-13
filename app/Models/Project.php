<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'featured_image',
        'slug',
        'active',
        'published_at',
        'user_id',
        'updater_id',
        'excerpt',
    ];

    protected $table = 'projects';

    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }


    public function updater() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
