<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            if (! Schema::hasColumn('village_profiles', 'head_photo')) {
                $table->string('head_photo')->nullable()->after('head_name');
            }

            if (! Schema::hasColumn('village_profiles', 'head_content')) {
                $table->json('head_content')->nullable()->after('head_photo');
            }

            if (! Schema::hasColumn('village_profiles', 'youth_photo')) {
                $table->string('youth_photo')->nullable()->after('youth_head_name');
            }

            if (! Schema::hasColumn('village_profiles', 'youth_content')) {
                $table->json('youth_content')->nullable()->after('youth_photo');
            }

            if (! Schema::hasColumn('village_profiles', 'map_photo')) {
                $table->string('map_photo')->nullable()->after('contact');
            }

            if (! Schema::hasColumn('village_profiles', 'map_link')) {
                $table->string('map_link')->nullable()->after('map_photo');
            }

            if (! Schema::hasColumn('village_profiles', 'map_content')) {
                $table->json('map_content')->nullable()->after('map_link');
            }
        });
    }

    public function down(): void
    {
        Schema::table('village_profiles', function (Blueprint $table) {
            $columns = [
                'head_photo',
                'head_content',
                'youth_photo',
                'youth_content',
                'map_photo',
                'map_link',
                'map_content',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('village_profiles', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};