<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
            'logo_url' => $this->logo_url,

            'country' => $this->country,
            'founded_year' => $this->founded_year,
            'stadium' => $this->stadium,

            'sort_order' => (int) $this->sort_order,
            'status' => (bool) $this->status,

            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,

            'league' => new LeagueResource($this->whenLoaded('league')),

            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
