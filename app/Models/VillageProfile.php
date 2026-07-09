<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'photo',
        'content',
        'village_name',
        'location',
        'head_name',
        'head_photo',
        'head_content',
        'youth_head_name',
        'youth_photo',
        'youth_content',
        'contact',
        'map_photo',
        'map_link',
        'map_content',
        'is_visible',
    ];

    protected $casts = [
        'content' => 'array',
        'head_content' => 'array',
        'youth_content' => 'array',
        'map_content' => 'array',
        'is_visible' => 'boolean',
    ];
}