<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'company_id',
        'lat',
        'lang',
        'icon'
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }
}
