<?php

namespace App\enums;

enum PaymentMethod: string
{
    case COD = 'cod';
    case SSLCOMMERZ = 'sslcommerz';

    public static function values(): array
    {
        return array_map(fn($method) => $method->value, self::cases());
    }

    public function label(): string
    {
        return match ($this) {
            self::COD => 'Cash on Delivery',
            self::SSLCOMMERZ => 'SSLCommerz',
        };
    }
}
