<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            if (! Schema::hasColumn('village_profiles', 'head_slug')) {
                $table->string('head_slug')->nullable()->after('head_name');
            }

            if (! Schema::hasColumn('village_profiles', 'youth_slug')) {
                $table->string('youth_slug')->nullable()->after('youth_head_name');
            }

            if (! Schema::hasColumn('village_profiles', 'map_title')) {
                $table->string('map_title')->nullable()->after('contact');
            }

            if (! Schema::hasColumn('village_profiles', 'map_slug')) {
                $table->string('map_slug')->nullable()->after('map_title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            if (Schema::hasColumn('village_profiles', 'head_slug')) {
                $table->dropColumn('head_slug');
            }

            if (Schema::hasColumn('village_profiles', 'youth_slug')) {
                $table->dropColumn('youth_slug');
            }

            if (Schema::hasColumn('village_profiles', 'map_title')) {
                $table->dropColumn('map_title');
            }

            if (Schema::hasColumn('village_profiles', 'map_slug')) {
                $table->dropColumn('map_slug');
            }
        });
    }
};