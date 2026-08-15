<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type',
        'discount',
        'minimum_amount',
        'expires_at',
        'active',
    ];

    protected $casts = [
        'discount' => 'decimal:2',
        'minimum_amount' => 'decimal:2',
        'expires_at' => 'datetime',
        'active' => 'boolean',
    ];
}
