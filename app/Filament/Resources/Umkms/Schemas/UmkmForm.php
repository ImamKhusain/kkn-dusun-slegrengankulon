<?php

namespace App\Filament\Resources\Umkms\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UmkmForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns([
                'default' => 1,
                'xl' => 12,
            ])
            ->components([
                Section::make('Content')
                    ->schema([
                        TextInput::make('business_name')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state): void {
                                $set('slug', Str::slug($state ?? ''));
                            }),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Select::make('umkm_category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('link')
                            ->label('Link')
                            ->url()
                            ->required()
                            ->suffixIcon('heroicon-m-globe-alt')
                            ->columnSpanFull(),

                        TextInput::make('whatsapp_number')
                            ->label('Wa')
                            ->required()
                            ->suffixIcon('heroicon-m-phone')
                            ->maxLength(20)
                            ->columnSpanFull(),

                        RichEditor::make('description')
                            ->label('Description')
                            ->required()
                            ->columnSpanFull(),

                        Hidden::make('status')
                            ->default('active'),
                    ])
                    ->columns(2)
                    ->columnSpan([
                        'default' => 1,
                        'xl' => 8,
                    ]),

                Section::make('Meta')
                    ->schema([
                        Toggle::make('is_visible')
                            ->label('Visibility')
                            ->default(true)
                            ->required(),

                        FileUpload::make('image')
                            ->label('Thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('umkm')
                            ->visibility('public')
                            ->required(),

                        DateTimePicker::make('published_at')
                            ->label('Published at')
                            ->default(now())
                            ->required()
                            ->native(false)
                            ->seconds(false),
                    ])
                    ->columnSpan([
                        'default' => 1,
                        'xl' => 4,
                    ]),
            ]);
    }
}