<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'token' => $this->token,

            'subtotal' => (float) $this->subtotal,
            'shipping' => (float) $this->shipping,
            'discount' => (float) $this->discount,
            'total' => (float) $this->total,

            'items_count' => $this->items->sum('quantity'),
            'items' => CartItemResource::collection($this->whenLoaded('items')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
