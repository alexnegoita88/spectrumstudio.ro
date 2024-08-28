<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent',
        'description',
        'parent',
        'slug',
    ];


    public function products(): HasMany 
    {
        return $this->hasMany(Product::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    // public function children(): HasMany
    // {
    //     return $this->hasMany(Category::class, 'parent'); // Relationship to get child categories
    // }
}
