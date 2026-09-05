<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\AttributeOption;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->with(['category', 'brand', 'club'])
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($request->limit ?? 10);

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::create([
            'category_id' => $request->post('category_id'),
            'brand_id' => $request->post('brand_id'),
            'club_id' => $request->post('club_id'),

            'name' => $request->post('name'),
            'slug' => Str::slug($request->slug) . '-' . Str::substr((string) Str::uuid(), 0, 8),

            'highlights' => $request->post('highlights'),
            'description' => $request->post('description'),

            'base_price' => $request->post('base_price'),
            'price' => $request->post('price'),
            'gender' => $request->post('gender'),

            'meta_title' => $request->post('meta_title'),
            'meta_description' => $request->post('meta_description'),
            'meta_keywords' => $request->post('meta_keywords'),

            'featured' => $request->boolean('featured'),
            'active' => $request->boolean('active'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['category', 'brand', 'club', 'variants']);
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete($product->id);

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        $clubs = Product::query()
            ->select('id', 'name')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->orderBy('name')
            ->limit(20)
            ->get();

        return response()->json($clubs);
    }

    public function media(Request $request, Product $product)
    {
        $request->validate([
            'cover'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'gallery'   => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $disk = config('app.disk');
        $directory = "products/{$product->id}";
        Storage::disk($disk)->makeDirectory($directory);

        $cover = $product->cover;
        $gallery = is_array($product->gallery) ? $product->gallery : [];


        if ($request->hasFile('cover')) {
            if ($cover && Storage::disk(config('app.disk'))->exists($cover)) {
                Storage::disk(config('app.disk'))->delete($cover);
            }

            $file = $request->file('cover');
            $filename = Str::slug($product->slug) . '-' . uniqid($product->id, false) . '.' . $file->extension();

            $cover = $file->storeAs($directory, $filename, $disk);

            Image::decode($request->file('cover'))
                ->cover(800, 800)
                ->save(Storage::disk(config('app.disk'))->path($cover));
        }


        if ($request->hasFile('gallery')) {

            foreach ($gallery as $image) {
                if ($image && Storage::disk($disk)->exists($image)) {
                    Storage::disk($disk)->delete($image);
                }
            }


            $gallery = [];

            foreach ($request->file('gallery') as $file) {

                $filename = Str::slug($product->slug) . '-' . uniqid($product->id, false) . '.' . $file->extension();

                $path = $file->storeAs($directory, $filename, $disk);

                Image::decode($file)
                    ->cover(800, 800)
                    ->save(Storage::disk(config('app.disk'))->path($path));

                $gallery[] = $path;
            }
        }

        $product->update([
            'cover'   => $cover,
            'gallery' => $gallery,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Media updated successfully.',
        ], Response::HTTP_OK);
    }

    public function variants(Request $request, Product $product)
    {
        $request->validate([
            'options' => ['required', 'array'],
            'options.*.attribute_id' => ['required', 'exists:attributes,id'],
            'options.*.attribute_option_id' => ['required', 'exists:attribute_options,id'],

            'variants' => ['required', 'array', 'min:1'],
            'variants.*.sku' => ['required', 'string'],
            'variants.*.name' => ['nullable', 'string'],
            'variants.*.price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.base_price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.stock' => ['nullable', 'integer', 'min:0'],
            'variants.*.low_stock_threshold' => ['nullable', 'integer', 'min:0'],
            'variants.*.is_active' => ['boolean'],

            'variants.*.options' => ['required', 'array', 'min:1'],
            'variants.*.options.*.attribute_id' => [
                'required',
                'exists:attributes,id',
            ],
            'variants.*.options.*.attribute_option_id' => [
                'required',
                'exists:attribute_options,id',
            ],
        ]);

        DB::transaction(function () use ($request, $product) {

            // Delete old variants
            $product->variants()->delete();

            // Delete old product options if needed
            $product->options()->delete();

            $product->update([
                'has_variants' => true,
            ]);

            foreach ($request->options as $index => $option) {
                $product->options()->updateOrCreate(
                    [
                        'attribute_id' => $option['attribute_id'],
                        'attribute_option_id' => $option['attribute_option_id'],
                    ],
                    [
                        'sort_order' => $index,
                    ]
                );
            }

            foreach ($request->variants as $item) {

                $variant = $product->variants()->create([
                    'sku' => $item['sku'],
                    'name' => $item['name'] ?? null,
                    'price' => $item['price'] ?? null,
                    'base_price' => $item['base_price'] ?? null,
                    'stock' => $item['stock'] ?? 0,
                    'low_stock_threshold' => $item['low_stock_threshold'] ?? 5,
                    'is_active' => $item['is_active'] ?? true,
                ]);

                $variant->options()->createMany($item['options']);
            }
        });

        return response()->json([
            'message' => 'Product variants created successfully.',
        ], 201);
    }

    public function getProductBySlug(Product $product)
    {
        $product->load([
            'category',
            'brand',
            'league',
            'club',
            'options.attribute',
            'options.option',

            'variants.options.attribute',
            'variants.options.option',
        ]);

        return ProductResource::make($product);
    }
}
