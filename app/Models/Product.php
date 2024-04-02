<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use NumberFormatter;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageUrlAttribute()
    {
        // return Storage::url($this->image);
        return asset('storage/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute()
    {
        $fmt = new NumberFormatter('en_US', NumberFormatter::DECIMAL);
        return $fmt->format($this->price);
    }
}
