<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use App\Models\UmkmCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Kategori awal UMKM dan Berita. Idempoten: updateOrCreate by slug,
     * aman dijalankan berulang tanpa menggandakan.
     */
    public function run(): void
    {
        // UMKM: 2 kategori
        foreach (['Product', 'Service'] as $name) {
            UmkmCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name],
            );
        }

        // Berita: 3 kategori
        foreach (['Kegiatan Dusun', 'Karang Taruna', 'Pengumuman'] as $name) {
            PostCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name],
            );
        }
    }
}
