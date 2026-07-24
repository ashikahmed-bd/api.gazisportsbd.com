<?php

namespace App\Http\Controllers;


use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Models\Cart;
use App\Models\Order;
use App\Notifications\NewOrderNotification;
use App\Notifications\OrderConfirmedNotification;
use App\Services\CodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'postcode' => ['nullable', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:100'],
            'note' => ['nullable', 'string'],
            'payment_method' => ['required', 'string'],
        ]);

        $cart = Cart::query()
            ->where('token', $request->header('X-Cart-Token'))
            ->first();

        if ($cart->items->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty. Please add items before placing an order.'
            ], Response::HTTP_BAD_REQUEST);
        }

        $order = Order::create([
            'name' => $request->post('name'),
            'phone' => $request->post('phone'),
            'address' => $request->post('address'),
            'city' => $request->post('city'),
            'state' => $request->post('state'),
            'postcode' => $request->post('postcode'),
            'country' => $request->post('country'),
            'note' => $request->post('note'),

            'subtotal' => $cart->subtotal,
            'shipping' => $cart->shipping,
            'tax'      => 0,
            'discount' => $cart->discount,
            'total' => $cart->total,

            'payment_method' => PaymentMethod::from($request->payment_method),
            'status' => OrderStatus::PENDING,
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,

                'name'       => $item->product->name,
                'slug'       => $item->product->slug,
                'cover'      => $item->product->cover,
                'options'    => $item->options,

                'price'      => $item->price,
                'quantity'   => $item->quantity,
            ]);
        }

        $cart->delete();

        if (config('app.sms.enabled')) {

            Notification::route('sms', config('app.support.phone'))
                ->notify(new NewOrderNotification($order));

            Notification::route('sms', $order->phone)
                ->notify(new OrderConfirmedNotification($order));
        }

        $method = strtolower($request->payment_method);

        return match (PaymentMethod::tryFrom($method)) {
            PaymentMethod::COD => response()->json(app(CodService::class)->initiate($order)),
            null => response()->json(['message' => 'Unsupported payment gateway'], 422),
        };
    }
}
