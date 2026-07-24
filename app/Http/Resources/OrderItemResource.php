<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'order' => $this->whenLoaded('order'),
            'product' => $this->whenLoaded('product'),
            'name' => $this->name,
            'slug' => $this->slug,
            'cover_url' => $this->cover_url,
            'options' => $this->options ?? [],

            'price' => $this->price,
            'quantity' => (int) $this->quantity,
            'total' => number_format($this->price * $this->quantity, 2, '.', ''),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
