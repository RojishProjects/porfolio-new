<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'tags',
        'category',
        'project_url',
        'icon',
        'is_hidden'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_hidden' => 'boolean',
    ];
}
