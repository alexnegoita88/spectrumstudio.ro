<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'pictures',
        'slug',
        'active',
        'published_at',
        'user_id',
        'updater_id',
        'excerpt',
    ];

    protected $table = 'projects';

    protected $casts = [
        'pictures' => 'array',
    ];


    public function scopeActive(Builder $query): Builder
    {
        // Presupunem că ai o coloană 'active' care este true (sau 1) pentru categoriile active
        return $query->where('active', true);
        // Sau dacă folosești 1/0: return $query->where('active', 1);
    }


    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }


    public function updater() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
