<?php

namespace App\Filament\Resources\Umkms\Pages;

use App\Filament\Resources\Umkms\UmkmResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateUmkm extends CreateRecord
{
    protected static string $resource = UmkmResource::class;

    public function getMaxContentWidth(): Width|string|null
    {
        return Width::Full;
    }
}