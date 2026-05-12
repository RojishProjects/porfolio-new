<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicDesign extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'category',
        'tools',
        'is_hidden'
    ];

    protected $casts = [
        'tools' => 'array',
        'is_hidden' => 'boolean',
    ];
}
