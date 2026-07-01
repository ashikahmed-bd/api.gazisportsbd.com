<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
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

            'product' => [
                'id' => $this->product->id,
                'name' => $this->product->name,
                'slug' => $this->product->slug,
                'cover_url' => $this->product->cover_url,
            ],

            'options' => $this->options ?? [],

            'price' => (float) $this->price,
            'quantity' => $this->quantity,
            'total' => (float) $this->total,
        ];
    }
}
