<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING    = 'pending';
    case CONFIRMED  = 'confirmed';
    case PROCESSING = 'processing';
    case SHIPPED    = 'shipped';
    case DELIVERED  = 'delivered';
    case CANCELLED  = 'cancelled';
    case RETURNED   = 'returned';


    public static function values(): array
    {
        return array_map(fn($status) => $status->value, self::cases());
    }
}
