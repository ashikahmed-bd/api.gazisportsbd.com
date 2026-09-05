<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariantOptionResource extends JsonResource
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

            'attribute' => $this->whenLoaded(
                'attribute',
                fn() => [
                    'id' => $this->attribute->id,
                    'name' => $this->attribute->name,
                    'slug' => $this->attribute->slug,
                ]
            ),

            'option' => $this->whenLoaded(
                'option',
                fn() => [
                    'id' => $this->option->id,
                    'name' => $this->option->name,
                    'slug' => $this->option->slug,
                    'hex' => $this->option->hex,
                    'image' => $this->option->image,
                ]
            ),
        ];
    }
}
