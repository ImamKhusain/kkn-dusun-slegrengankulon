<?php

namespace App\Filament\Resources\VillageProfiles;

use App\Filament\Resources\VillageProfiles\Pages\CreateVillageProfile;
use App\Filament\Resources\VillageProfiles\Pages\EditVillageProfile;
use App\Filament\Resources\VillageProfiles\Pages\ListVillageProfiles;
use App\Filament\Resources\VillageProfiles\Schemas\VillageProfileForm;
use App\Filament\Resources\VillageProfiles\Tables\VillageProfilesTable;
use App\Models\VillageProfile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VillageProfileResource extends Resource
{
    protected static ?string $model = VillageProfile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static string|UnitEnum|null $navigationGroup = 'Setting';

    protected static ?string $navigationLabel = 'Profil Dusun';

    protected static ?string $modelLabel = 'Profil Dusun';

    protected static ?string $pluralModelLabel = 'Profil Dusun';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return VillageProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VillageProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVillageProfiles::route('/'),
            'create' => CreateVillageProfile::route('/create'),
            'edit' => EditVillageProfile::route('/{record}/edit'),
        ];
    }
}