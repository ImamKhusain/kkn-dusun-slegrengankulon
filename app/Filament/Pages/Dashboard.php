<?php

namespace App\Filament\Pages;

use App\Filament\Resources\VillageProfiles\VillageProfileResource;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static bool $shouldRegisterNavigation = false;

    public function mount(): void
    {
        $this->redirect(VillageProfileResource::getUrl('index'));
    }
}