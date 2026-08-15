<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $coupons = Coupon::query()
            ->when($request->search, function ($query, $search) {
                $query->where('code', 'like', "%{$search}%");
            })
            ->when($request->has('active'), function ($query) use ($request) {
                $query->where('active', $request->boolean('active'));
            })
            ->latest()
            ->paginate($request->input('limit', 10));

        return CouponResource::collection($coupons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        Coupon::create([
            'code' => $request->code,
            'type' => $request->type,
            'discount' => $request->discount,
            'minimum_amount' => $request->input('minimum_amount', 0),
            'expires_at' => $request->expires_at,
            'active' => $request->boolean('active', true),
        ]);

        return response()->json([
            'message' => 'Coupon created successfully.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return CouponResource::make($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->update([
            'code' => $request->code,
            'type' => $request->type,
            'discount' => $request->discount,
            'minimum_amount' => $request->input('minimum_amount', 0),
            'expires_at' => $request->expires_at,
            'active' => $request->boolean('active', false),
        ]);

        return response()->json([
            'message' => 'Coupon updated successfully.',
            'data' => $coupon->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return response()->json([
            'message' => 'Coupon deleted successfully.',
        ]);
    }
}
