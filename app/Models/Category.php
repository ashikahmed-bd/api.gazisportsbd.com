<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return 'https://placehold.co/1920x640';
        }

        return Storage::disk('public')->url($this->image);
    }
}
