<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\Tags\Url;

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

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(route('article.details', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);
    }






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
