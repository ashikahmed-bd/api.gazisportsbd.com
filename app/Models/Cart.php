<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];


    public function getSubtotalAttribute()
    {
        return $this->items->sum('total');
    }

    public function getTotalAttribute()
    {
        return $this->subtotal + $this->shipping - $this->discount;
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
