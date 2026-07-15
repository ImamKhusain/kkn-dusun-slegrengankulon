<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        // Profil Dusun
        'title',
        'slug',
        'photo',
        'content',

        // Informasi Singkat
        'village_name',
        'location',
        'contact',

        // Ketua Dusun
        'head_name',
        'head_slug',
        'head_photo',
        'head_content',

        // Ketua Karang Taruna
        'youth_head_name',
        'youth_slug',
        'youth_photo',
        'youth_content',

        // Peta Dusun
        'map_title',
        'map_slug',
        'map_photo',
        'map_link',
        'map_content',

        // Status
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