<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
        'quantity' => 'integer',
    ];

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->price * $this->quantity,
        );
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
