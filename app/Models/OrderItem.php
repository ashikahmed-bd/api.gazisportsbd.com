<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OrderItem extends Model
{

    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
    ];

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->price * $this->quantity,
        );
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCoverUrlAttribute(): string
    {
        if (empty($this->cover)) {
            return asset('/images/product.svg');
        }

        return Storage::disk('public')->url($this->cover);
    }
}
