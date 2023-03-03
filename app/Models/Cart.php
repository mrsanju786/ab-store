<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function Dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id', 'id');
    }

    public function dish_variants()
    {
        return $this->belongsTo(DishVariant::class, 'dish_id', 'id');
    }

}
