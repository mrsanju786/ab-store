<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryTax extends Model
{
    use HasFactory;
    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
