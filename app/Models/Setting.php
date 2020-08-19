<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'siteName_ar',
        'siteName_en',
        'email',
        'logo',
        'icon',
        'main_lang',
        'desc',
        'keywords',
        'status',
        'message_siteSetting',
    ];
}
