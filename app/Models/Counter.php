<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    public function area(){

        return $this->belongsTo(Area::class);
    }

    public function Branch(){
        return $this->belongsTo(Branch::class);
    }
}
