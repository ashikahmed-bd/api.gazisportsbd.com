<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    protected function getCart(Request $request): Cart
    {
        $token = $request->header('X-Cart-Token');

        if (!$token) {
            $token = (string) Str::uuid();
        }

        $cart = Cart::firstOrCreate([
            'token' => $token,
        ]);

        return $cart;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cart = $this->getCart($request);

        $cart->load('items.product');

        return new CartResource($cart);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'variant_id' => ['nullable', 'exists:variants,id'],
            'quantity'   => ['required', 'integer', 'min:1'],
        ]);

        $cart = $this->getCart($request);
        $product = Product::with('variants')->findOrFail($request->product_id);

        $price = $product->price;

        if ($request->filled('variant_id')) {
            $variant = $product->variants()
                ->where('id', $request->variant_id)
                ->firstOrFail();

            if ($variant->stock < $request->quantity) {
                return response()->json([
                    'message' => 'Insufficient variant stock.'
                ], 422);
            }

            $price = $variant->price;
        }

        $item = $cart->items()->firstOrNew([
            'product_id' => $product->id,
            'variant_id' => $request->variant_id,
        ]);

        $item->sku = $request->variant_id ? $variant->sku : $product->sku;
        $item->price = $price;
        $item->quantity += $request->quantity;

        $item->save();

        return response()->json([
            'message' => 'Added to cart.',
            'token'   => $cart->cart_token,
        ], Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $item->update([
            'quantity' => $request->post('quantity'),
        ]);

        $cart = $this->getCart($request);

        $cart->update([
            'coupon_id' => null,
            'coupon_code' => null,
            'discount' => 0,
        ]);

        return response()->json([
            'message' => 'Cart updated.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CartItem $item)
    {
        $item->delete();

        $cart = $this->getCart($request);

        $cart->update([
            'discount' => 0,
        ]);

        return response()->json([
            'message' => 'Item removed.',
        ], Response::HTTP_OK);
    }

    public function clear(Request $request)
    {
        $cart = $this->getCart($request);

        $cart->items()->delete();

        return response()->json([
            'message' => 'Cart cleared.',
        ], Response::HTTP_OK);
    }


    public function couponApply(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $cart = $this->getCart($request);

        $coupon = Coupon::where('code', strtoupper(trim($request->code)))
            ->where('active', true)
            ->first();

        if (! $coupon) {
            return response()->json([
                'message' => 'Invalid coupon code.',
            ], 422);
        }

        if ($coupon->expires_at && $coupon->expires_at->isPast()) {
            return response()->json([
                'message' => 'Coupon has expired.',
            ], 422);
        }

        $subtotal = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        if ($cart->total < $coupon->minimum_amount) {
            return response()->json([
                'success' => false,
                'message' => "Minimum order amount is ৳{$coupon->minimum_amount}.",
            ], 422);
        }

        $discount = $coupon->type === 'fixed' ? $coupon->discount : ($subtotal * $coupon->discount / 100);

        $discount = min($discount, $subtotal);

        $cart->update([
            'discount' => $discount,
            'coupon_id' => $coupon->id,
            'coupon_code' => $coupon->code,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Coupon applied successfully.',
        ]);
    }


    public function shipping(Request $request)
    {
        $request->validate([
            'zone' => ['required', 'string'],
        ]);

        $cart = $this->getCart($request);

        $cart->update([
            'shipping' => config('app.shipping.' . $request->zone, 120),
        ]);

        return response()->json([
            'message' => 'Shipping updated.',
        ]);
    }
}
