<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCategoryStatusAttribute()
    {
        return $this->status == '1' ? 'active' : 'suspended';
    }
    public function getImageUrlAttribute()
    {
        $base = asset("uploads/category/");
        return $base . "/{$this->image}";
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
