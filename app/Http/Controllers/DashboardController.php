<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'stats' => [
                'total_orders' => Order::query()->count(),
                'revenue' => (float) Order::query()->where('status', OrderStatus::DELIVERED)->sum('total'),
                'products' => Product::query()->count(),
                'customers' => User::query()->where('role', 'user')->count(),
            ],

            'recent_orders' => Order::query()->latest()
                ->take(10)
                ->get(),

            'lowStocks' => Product::query()
                ->select('id', 'name', 'stock', 'base_price', 'price', 'gender', 'active')
                ->where('stock', '<=', 5)
                ->latest()
                ->take(10)
                ->get(),
        ]);
    }
}
