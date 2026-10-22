<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteBackground extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'image_url',
        'overlay_opacity',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'overlay_opacity' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
