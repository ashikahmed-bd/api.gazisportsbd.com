<?php

namespace App\Http\Controllers;

use App\Http\Resources\VariantResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $product->load('variants.options');

        return $product->variants;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
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

            // Delete existing variants and their variant options
            $product->variants()->delete();

            // Delete existing product options
            $product->options()->delete();

            // Product has variants
            $product->update([
                'has_variants' => true,
            ]);

            // Save product options
            foreach ($request->options as $index => $option) {
                $product->options()->create([
                    'attribute_id'       => $option['attribute_id'],
                    'attribute_option_id' => $option['attribute_option_id'],
                    'sort_order'         => $index,
                ]);
            }

            // Create variants
            foreach ($request->variants as $item) {

                $variant = $product->variants()->create([
                    'sku'                => $item['sku'],
                    'name'               => $item['name'] ?? null,
                    'price'              => $item['price'] ?? null,
                    'base_price'         => $item['base_price'] ?? null,
                    'stock'              => $item['stock'] ?? 0,
                    'low_stock_threshold' => $item['low_stock_threshold'] ?? 5,
                    'is_active'          => $item['is_active'] ?? true,
                ]);

                // Save variant options safely
                foreach ($item['options'] as $option) {
                    $variant->options()->updateOrCreate(
                        [
                            'attribute_id' => $option['attribute_id'],
                        ],
                        [
                            'attribute_option_id' => $option['attribute_option_id'],
                        ]
                    );
                }
            }
        });

        return response()->json([
            'message' => 'Product variants created successfully.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
