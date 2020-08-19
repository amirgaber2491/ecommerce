<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triad extends Model
{
    protected $fillable = [
        'triadName_ar',
        'triadName_en',
        'icon'
    ];
}
