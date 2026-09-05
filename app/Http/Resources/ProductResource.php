<?php

namespace App\Http\Resources;

use App\Http\Resources\VariantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'slug' => $this->category->slug,
                ];
            }),

            'brand' => $this->whenLoaded('brand', function () {
                return [
                    'id' => $this->brand->id,
                    'name' => $this->brand->name,
                    'slug' => $this->brand->slug,
                ];
            }),

            'league' => $this->whenLoaded('league', function () {
                return [
                    'id' => $this->league->id,
                    'name' => $this->league->name,
                    'slug' => $this->league->slug,
                ];
            }),

            'club' => $this->whenLoaded('club', function () {
                return [
                    'id' => $this->club->id,
                    'name' => $this->club->name,
                    'slug' => $this->club->slug,
                ];
            }),

            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'description' => $this->description,

            'price' => $this->price,
            'base_price' => $this->base_price,
            'currency' => $this->currency,

            'has_discount' => $this->price > 0 && $this->price < $this->base_price,
            'discount_percentage' => $this->base_price > 0 ? round((($this->base_price - $this->price) / $this->base_price) * 100) : 0,

            'gender' => $this->gender,

            'cover_url' => $this->cover_url,
            'gallery' => $this->images,

            'views' => $this->views,
            'featured' => $this->featured,
            'has_variants' => $this->has_variants,

            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,

            'active' => $this->active,

            'attributes' => $this->whenLoaded(
                'options',
                fn() => $this->options
                    ->pluck('attribute')
                    ->unique('id')
                    ->values()
                    ->map(fn($attribute) => [
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'slug' => $attribute->slug,
                        'type' => $attribute->type,

                        'options' => $this->options
                            ->where('attribute_id', $attribute->id)
                            ->pluck('option')
                            ->values()
                            ->map(fn($option) => [
                                'id' => $option->id,
                                'name' => $option->name,
                                'slug' => $option->slug,
                                'hex' => $option->hex,
                                'image' => $option->image,
                            ]),
                    ])
            ),

            'variants' => VariantResource::collection(
                $this->whenLoaded('variants')
            ),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
