<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case FAILED = 'failed';
    case PARTIAL = 'partial';
    case REFUNDED = 'refunded';
    case CANCELLED = 'cancelled';
}
