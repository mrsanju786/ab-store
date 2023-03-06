<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function dish(){
        return $this->belongsTo(Dish::class);
    }

    public function dish_variant(){
        return $this->belongsTo(DishVariant::class);
    }
}
