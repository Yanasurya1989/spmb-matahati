<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventLink extends Model
{
    protected $fillable = [
        'title',
        'url',
        'icon',
        'type',
        'show_download',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'show_download' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
