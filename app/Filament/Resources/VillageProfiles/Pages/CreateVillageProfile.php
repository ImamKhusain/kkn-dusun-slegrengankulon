<?php

namespace App\Filament\Resources\VillageProfiles\Pages;

use App\Filament\Resources\VillageProfiles\VillageProfileResource;
use App\Models\VillageProfile;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateVillageProfile extends CreateRecord
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

    public function getTitle(): string
    {
        return 'Profil Dusun';
    }

    public function getHeading(): string
    {
        return 'Profil Dusun';
    }

    public function getMaxContentWidth(): Width|string|null
    {
        return Width::SevenExtraLarge;
    }
}