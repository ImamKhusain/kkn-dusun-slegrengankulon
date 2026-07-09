<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'post_category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'author_name',
        'is_visible',
        'is_featured',
        'tags',
        'published_at',
        'meta_description',
        'status',
    ];

    protected $casts = [
        'content' => 'array',
        'tags' => 'array',
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Post $post): void {
            if (empty($post->author_name)) {
                $post->author_name = auth()->user()?->name ?? 'Admin Dusun';
            }

            if (empty($post->published_at)) {
                $post->published_at = now();
            }

            if (empty($post->status)) {
                $post->status = 'published';
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }
}