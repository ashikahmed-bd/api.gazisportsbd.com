<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Variant extends Model
{
    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
        'price' => 'decimal:2',
    ];

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('/images/product.svg');
        }

        return Storage::disk('public')->url($this->image);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
