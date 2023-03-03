<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_name',
        'dish_price',
        'dish_code',
        'dish_images',
        'has_variant',
        'is_tax_inclusive',
        'is_discount',
        'category_id',
        'counter_id',
        'discount_ids',
        'chef_preparation',
        'dish_hsn',
        'edited_at',
        'edited_by',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function counter(){
        return $this->belongsTo(Counter::class);
    }

    public function dishVariant(){
        return $this->hasMany(DishVariant::class,'id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'id');
    }
}
