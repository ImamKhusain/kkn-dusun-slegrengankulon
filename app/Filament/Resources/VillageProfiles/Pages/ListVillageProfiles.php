<?php

namespace App\Filament\Resources\VillageProfiles\Pages;

use App\Filament\Resources\VillageProfiles\VillageProfileResource;
use App\Models\VillageProfile;
use Filament\Resources\Pages\ListRecords;

class ListVillageProfiles extends ListRecords
{
    protected static string $resource = VillageProfileResource::class;

    public function mount(): void
    {
        $profile = VillageProfile::firstOrCreate(
            ['slug' => 'profil-dusun'],
            [
                'title' => 'Profil Dusun',
                'village_name' => 'Dusun Slegrengan Kulon',
                'is_visible' => true,
            ]
        );

        $this->redirect(VillageProfileResource::getUrl('edit', [
            'record' => $profile,
        ]));
    }
}