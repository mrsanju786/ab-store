<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTax extends Model
{
    use HasFactory;
    public function Location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function Tax()
    {
        return $this->belongsTo(Tax::class, 'tax_id', 'id');
    }
}
