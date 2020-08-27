<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'mobile',
        'facebook',
        'twitter',
        'website',
        'contact_name',
        'address',
        'lat',
        'lang',
        'icon',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
