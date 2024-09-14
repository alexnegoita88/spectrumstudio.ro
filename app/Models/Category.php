<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'featured_picture',
    ];


    public function products(): BelongsToMany 
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id'); // Relationship to get child categories
    }
}
