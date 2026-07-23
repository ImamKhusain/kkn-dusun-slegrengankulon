<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Title')
                    ->limit(35)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author_name')
                    ->label('Author')
                    ->default('Admin Dusun')
                    ->searchable(),

                ToggleColumn::make('is_visible')
                    ->label('Visibility'),

                TextColumn::make('tags')
                    ->label('Tags')
                    ->formatStateUsing(function ($state): string {
                        if (is_array($state)) {
                            return collect($state)
                                ->map(fn ($tag) => '#' . $tag)
                                ->join(' ');
                        }

                        return $state ?? '-';
                    })
                    ->wrap(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Post $record): void {
                        $record->update([
                            'status' => 'rejected',
                            'is_visible' => false,
                        ]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}