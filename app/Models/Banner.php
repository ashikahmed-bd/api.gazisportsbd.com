<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Banner extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return 'https://placehold.co/1920x640';
        }

        return Storage::disk('public')->url($this->image);
    }

    public function scopeActive(Builder $query)
    {
        return $query
            ->where('status', true)
            ->where(function ($q) {
                $q->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', now());
            })
            ->orderBy('sort_order');
    }
}
