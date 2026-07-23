<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Buat / perbarui akun admin Filament untuk panel /admin.
     * Idempoten: aman dijalankan berulang, tidak menggandakan user.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin-kkn@slegrengankulon.my.id'],
            [
                'name' => 'Admin KKN',
                'password' => 'kknupnyk#376', // di-hash otomatis oleh cast 'password' => 'hashed'
            ],
        );
    }
}
