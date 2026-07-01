<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class League extends Model
{
    protected $guarded = [];

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

    public function getLogoUrlAttribute(): string
    {
        if (empty($this->logo)) {
            return asset('/images/logo.svg');
        }

        return Storage::disk('public')->url($this->logo);
    }
}
