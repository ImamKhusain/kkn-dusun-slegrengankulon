<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Umkm extends Model
{
    protected $fillable = [
        'umkm_category_id',
        'business_name',
        'slug',
        'link',
        'owner_name',
        'description',
        'price',
        'image',
        'whatsapp_number',
        'address',
        'status',
        'is_visible',
        'published_at',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Umkm $umkm): void {
            if (empty($umkm->published_at)) {
                $umkm->published_at = now();
            }

            if (empty($umkm->status)) {
                $umkm->status = 'active';
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(UmkmCategory::class, 'umkm_category_id');
    }
}