<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Models\Order;


class CodService
{
    public function initiate(Order $order)
    {
        $order->update([
            'status' => OrderStatus::PENDING,
            'payment_method' => PaymentMethod::COD
        ]);

        return [
            'gateway' => PaymentMethod::COD,
            'message' => 'Order placed successfully. Pay Cash on Delivery.',
            'redirect_url' => config('app.client_url') . '/orders/success?order_no=' . $order->order_no,
        ];
    }
}
