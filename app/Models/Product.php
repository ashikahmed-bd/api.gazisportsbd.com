<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'gallery' => 'array',
        'base_price' => 'decimal:2',
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(ProductOption::class)->orderBy('sort_order');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }


    public function getCoverUrlAttribute(): string
    {
        if (empty($this->cover)) {
            return asset('/images/product.svg');
        }

        return Storage::disk('public')->url($this->cover);
    }

    public function getImagesAttribute(): array
    {
        if (!is_array($this->gallery)) return [];

        return collect($this->gallery)
            ->map(fn($path) => Storage::disk('public')->url($path))
            ->toArray();
    }


    public function getDiscountAmountAttribute(): float
    {
        return max(0, $this->base_price - $this->price);
    }

    public function getDiscountPercentageAttribute(): int
    {
        if ($this->base_price <= 0) {
            return 0;
        }

        return (int) round(
            (($this->base_price - $this->price) / $this->base_price) * 100
        );
    }
}
