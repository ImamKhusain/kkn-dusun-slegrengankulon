<?php

namespace App\Filament\Resources\Umkms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class UmkmsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('business_name')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('owner_name')
                    ->label('Author')
                    ->default('Admin Dusun')
                    ->searchable(),

                ToggleColumn::make('is_visible')
                    ->label('Visibility'),

                TextColumn::make('link')
                    ->label('Link')
                    ->limit(25)
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}