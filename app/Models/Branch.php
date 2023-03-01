<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function branchLicense(){

        return $this->belongsTo(License::class,'id');
    }

    public function company(){

        return $this->belongsTo(Company::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
