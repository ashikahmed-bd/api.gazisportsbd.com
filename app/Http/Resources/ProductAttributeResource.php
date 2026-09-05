<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributeResource extends JsonResource
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
            'id' => $this->attribute->id,
            'name' => $this->attribute->name,
            'slug' => $this->attribute->slug,
            'type' => $this->attribute->type,

            'options' => AttributeOptionResource::collection(
                $this->attribute->options
            ),
        ];
    }
}
