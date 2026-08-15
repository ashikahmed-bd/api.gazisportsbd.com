<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'id'              => $this->id,
            'code'            => $this->code,
            'type'            => $this->type,
            'discount'        => $this->discount,
            'minimum_amount'  => $this->minimum_amount,
            'expires_at'      => $this->expires_at,
            'expires_at_formated' => $this->expires_at?->toDateString(),
            'active'          => $this->active,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
