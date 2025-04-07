<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'pictures',
        'slug',
        'active',
        'external_link',
        'catalogs',
    ];

    protected $casts = [
        'pictures' => 'array',
        'external_link'=> 'array',
        'catalogs'=> 'array',
    ];


    public function scopeActive(Builder $query): Builder
    {
        // Presupunem că ai o coloană 'active' care este true (sau 1) pentru categoriile active
        return $query->where('active', true);
        // Sau dacă folosești 1/0: return $query->where('active', 1);
    }


    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
