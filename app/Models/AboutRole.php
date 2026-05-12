<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutRole extends Model
{
    protected $fillable = ['title', 'description', 'key_areas'];

    protected $casts = [
        'key_areas' => 'array',
    ];
}
