<?php

namespace App\Http\Resources;

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

            'name' => $this->name,
            'slug' => $this->slug,

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

            'club' => $this->whenLoaded('club', function () {
                return [
                    'id' => $this->club->id,
                    'name' => $this->club->name,
                    'slug' => $this->club->slug,
                ];
            }),

            'highlights' => $this->highlights,
            'description' => $this->description,

            'options' => $this->options,

            'base_price' => (float) $this->base_price,
            'price' => (float) $this->price,

            'has_discount' => $this->price > 0 && $this->price < $this->base_price,
            'discount_percentage' => $this->base_price > 0 ? round((($this->base_price - $this->price) / $this->base_price) * 100) : 0,

            'stock' => $this->stock,
            'in_stock' => $this->stock > 0,

            'gender' => $this->gender,

            'cover_url' => $this->cover_url,
            'gallery' => $this->images,

            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,

            'views' => $this->views,

            'featured' => (bool) $this->featured,
            'active' => (bool) $this->active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
