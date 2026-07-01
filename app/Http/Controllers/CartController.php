<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
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

        $cart->cart_token = $token;

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
            'quantity'   => ['required', 'integer', 'min:1'],
            'options'    => ['nullable', 'array'],
        ]);

        $cart = $this->getCart($request);
        $product = Product::findOrFail($request->product_id);

        $item = $cart->items()->firstOrNew([
            'product_id' => $product->id,
            'options'    => $request->options ?? [],
        ]);

        $item->price = $product->price;
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
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'message' => 'Cart updated.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $item)
    {
        $item->delete();

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
}
