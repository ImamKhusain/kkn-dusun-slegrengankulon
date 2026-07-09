<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Enums\Width;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function getMaxContentWidth(): Width|string|null
    {
        return Width::SevenExtraLarge;
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('New post'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'kegiatan-dusun' => Tab::make('Kegiatan Dusun')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->whereHas('category', fn (Builder $query) => $query->where('slug', 'kegiatan-dusun'))),

            'umkm-dusun' => Tab::make('UMKM Dusun')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->whereHas('category', fn (Builder $query) => $query->where('slug', 'umkm-dusun'))),

            'pengumuman' => Tab::make('Pengumuman')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->whereHas('category', fn (Builder $query) => $query->where('slug', 'pengumuman'))),

            'karang-taruna' => Tab::make('Karang Taruna')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->whereHas('category', fn (Builder $query) => $query->where('slug', 'karang-taruna'))),
        ];
    }
}