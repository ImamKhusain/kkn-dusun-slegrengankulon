<?php

namespace App\Filament\Resources\UmkmCategories\Pages;

use App\Filament\Resources\UmkmCategories\UmkmCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUmkmCategories extends ListRecords
{
    protected static string $resource = UmkmCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
