<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufact extends Model
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
    ];
}
