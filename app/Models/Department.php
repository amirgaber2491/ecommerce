<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'dep_name_ar',
        'dep_name_en',
        'description',
        'keyword',
        'icon',
        'parent_id'
    ];

    public function parent()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }
}
