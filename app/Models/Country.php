<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function countryTax()
    {
        return $this->belongsTo(CountryTax::class, 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'id');
    }
}
