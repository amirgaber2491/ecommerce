<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'stateName_ar',
        'stateName_en',
        'city_id',
        'country_id'

    ];
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
