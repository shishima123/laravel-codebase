<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, SoftDeletes, Sluggable, Searchable;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'sort'
    ];
    public function subCategories(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeByParent(Builder $query, $parent_id = 0): Builder
    {
        return $query->where('parent_id', $parent_id);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
