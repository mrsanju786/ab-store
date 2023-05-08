<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ProductSize()
    {
        return $this->hasOne(ProductSizeVariant::class);
    }

    public function ProductColor()
    {
        return $this->hasOne(ProductColorVariant::class);
    }
}
