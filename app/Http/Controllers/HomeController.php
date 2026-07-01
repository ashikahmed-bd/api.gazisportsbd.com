<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ClubResource;
use App\Http\Resources\LeagueResource;
use App\Http\Resources\ProductResource;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Club;
use App\Models\League;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function index()
    {
        $banners = Banner::query()
            ->where('active', true)
            ->where(function ($query) {
                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', now());
            })
            ->orderBy('sort_order', 'asc')
            ->get();

        $categories = Category::query()
            ->whereNull('parent_id')
            ->where('active', true)
            ->withCount('products')
            ->get();

        $featured = Product::query()
            ->with(['brand', 'club'])
            ->where('active', true)
            ->where('featured', true)
            ->latest()
            ->take(10)
            ->get();

        $trending = Product::query()
            ->where('active', true)
            ->with(['brand', 'club'])
            ->orderByDesc('views')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        $brands = Brand::query()
            ->where('active', true)
            ->orderBy('name', 'asc')
            ->get();

        $leagues = League::query()
            ->where('status', true)
            ->withCount('clubs')
            ->orderBy('sort_order')
            ->get();


        $clubs = Club::query()
            ->where('status', true)
            ->orderBy('sort_order', 'asc')
            ->take(20)
            ->get();

        return response()->json([
            'banners' =>  BannerResource::collection($banners),
            'categories' =>  CategoryResource::collection($categories),
            'featured' => ProductResource::collection($featured),
            'trending' => ProductResource::collection($trending),
            'brands' => BrandResource::collection($brands),
            'leagues' => LeagueResource::collection($leagues),
            'clubs' => ClubResource::collection($clubs),
        ], Response::HTTP_OK);
    }

    public function getShop(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'default');
        $limit = $request->input('limit', 12);
        $category = $request->input('category');

        $products = Product::query()
            ->where('active', true)
            ->when($category, function ($query) use ($category) {
                $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })

            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })

            ->when($request->filled('min_price'), function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })

            ->when($request->filled('max_price'), function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })

            ->when($sort !== 'default', function ($query) use ($sort) {
                match ($sort) {
                    'price_low' => $query->orderBy('price', 'asc'),
                    'price_high' => $query->orderBy('price', 'desc'),
                    'latest' => $query->orderBy('name', 'desc'),
                    'popular' => $query->where('featured', true),
                    default => $query->orderBy('name', 'asc'),
                };
            })
            ->paginate($limit);

        return ProductResource::collection($products);
    }
}
