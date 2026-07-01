<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'parent' => $this->whenLoaded('parent', function () {
                return [
                    'id' => $this->parent->id,
                    'name' => $this->parent->name,
                ];
            }),
            'name' => $this->name,
            'slug' => $this->slug,
            'image_url' => $this->image_url,

            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'active' => (bool) $this->active,

            'children' => CategoryResource::collection($this->whenLoaded('children')),
        ];
    }
}
