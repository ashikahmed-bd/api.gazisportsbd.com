<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Club extends Model
{
    protected $guarded = [];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getLogoUrlAttribute(): string
    {
        if (empty($this->logo)) {
            return asset('/images/logo.svg');
        }

        return Storage::disk('public')->url($this->logo);
    }
}
