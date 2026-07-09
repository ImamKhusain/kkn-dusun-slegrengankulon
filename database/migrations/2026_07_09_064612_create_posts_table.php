<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_category_id')
                ->nullable()
                ->constrained('post_categories')
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->json('content')->nullable();
            $table->string('thumbnail')->nullable();

            $table->string('author_name')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->json('tags')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->text('meta_description')->nullable();

            $table->enum('status', ['draft', 'published', 'rejected'])
                ->default('published');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};