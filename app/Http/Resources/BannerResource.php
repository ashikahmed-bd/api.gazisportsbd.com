<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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

            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,

            'image_url' => $this->image_url,

            'button_text' => $this->button_text,
            'button_link' => $this->button_link,

            'position' => $this->position,
            'sort_order' => $this->sort_order,

            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,

            'status' => $this->status,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
