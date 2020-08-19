<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'countryName_ar',
        'countryName_en',
        'mob',
        'code',
        'logo'
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
}
