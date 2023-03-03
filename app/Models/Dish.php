<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

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
