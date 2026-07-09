<?php

namespace App\Filament\Resources\UmkmCategories\Pages;

use App\Filament\Resources\UmkmCategories\UmkmCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUmkmCategory extends EditRecord
{
    protected static string $resource = UmkmCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
