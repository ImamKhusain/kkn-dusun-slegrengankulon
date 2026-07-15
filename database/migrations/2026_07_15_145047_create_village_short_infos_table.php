<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_short_infos', function (Blueprint $table) {
            $table->id();
            $table->string('village_name')->nullable();
            $table->string('location')->nullable();
            $table->string('head_name')->nullable();
            $table->string('youth_head_name')->nullable();
            $table->string('contact')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_short_infos');
    }
};