<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function company(){

        return $this->belongsTo(Company::class);
    }

    public function branch(){

        return $this->belongsTo(Branch::class);
    }
}
