<?php

namespace App\Filament\Resources\VillageProfiles\Pages;

use App\Filament\Resources\VillageProfiles\VillageProfileResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditVillageProfile extends EditRecord
{
    protected static string $resource = VillageProfileResource::class;

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