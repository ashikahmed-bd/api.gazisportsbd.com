<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $guarded = [];


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function booted()
    {
        static::creating(function ($order) {
            if (empty($order->order_no)) {
                $order->order_no = now()->format('ymd') . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
