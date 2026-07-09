<?php

namespace App\Filament\Resources\VillageProfiles\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class VillageProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns([
                'default' => 1,
                'xl' => 12,
            ])
            ->components([
                Grid::make([
                    'default' => 1,
                    'xl' => 12,
                ])
                    ->extraAttributes([
                        'x-data' => "{ activeSection: 'profil' }",
                    ])
                    ->schema([
                        View::make('filament.components.village-profile-side-menu')
                            ->columnSpan([
                                'default' => 1,
                                'xl' => 3,
                            ]),

                        Grid::make(1)
                            ->schema([
                                Section::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'profil'",
                                        'x-cloak' => 'x-cloak',
                                    ])
                                    ->schema([
                                        Tabs::make('Profil Dusun Tabs')
                                            ->tabs([
                                                Tab::make('Content')
                                                    ->schema([
                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Title')
                                                                    ->default('Profil Dusun')
                                                                    ->required()
                                                                    ->maxLength(255)
                                                                    ->live(onBlur: true)
                                                                    ->afterStateUpdated(function (Set $set, ?string $state): void {
                                                                        $set('slug', Str::slug($state ?? ''));
                                                                    }),

                                                                TextInput::make('slug')
                                                                    ->label('Slug')
                                                                    ->default('profil-dusun')
                                                                    ->required()
                                                                    ->unique(ignoreRecord: true)
                                                                    ->maxLength(255),
                                                            ]),

                                                        FileUpload::make('photo')
                                                            ->label('Logo / Foto Dusun')
                                                            ->image()
                                                            ->disk('public')
                                                            ->directory('village-profile')
                                                            ->visibility('public')
                                                            ->columnSpanFull(),

                                                        self::contentBuilder('content', 'village-profile/content'),
                                                    ]),
                                            ])
                                            ->columnSpanFull(),
                                    ]),

                                Section::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'ketua-dusun'",
                                        'x-cloak' => 'x-cloak',
                                    ])
                                    ->schema([
                                        Tabs::make('Ketua Dusun Tabs')
                                            ->tabs([
                                                Tab::make('Content')
                                                    ->schema([
                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('head_name')
                                                                    ->label('Title')
                                                                    ->placeholder('Ketua Dusun'),

                                                                TextInput::make('head_slug')
                                                                    ->label('Slug')
                                                                    ->default('ketua-dusun')
                                                                    ->disabled()
                                                                    ->dehydrated(false),
                                                            ]),

                                                        FileUpload::make('head_photo')
                                                            ->label('Foto Ketua Dusun')
                                                            ->image()
                                                            ->disk('public')
                                                            ->directory('village-profile/ketua-dusun')
                                                            ->visibility('public')
                                                            ->columnSpanFull(),

                                                        self::contentBuilder('head_content', 'village-profile/ketua-dusun/content'),
                                                    ]),
                                            ])
                                            ->columnSpanFull(),
                                    ]),

                                Section::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'karang-taruna'",
                                        'x-cloak' => 'x-cloak',
                                    ])
                                    ->schema([
                                        Tabs::make('Ketua Karang Taruna Tabs')
                                            ->tabs([
                                                Tab::make('Content')
                                                    ->schema([
                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('youth_head_name')
                                                                    ->label('Title')
                                                                    ->placeholder('Ketua Karang Taruna'),

                                                                TextInput::make('youth_slug')
                                                                    ->label('Slug')
                                                                    ->default('ketua-karang-taruna')
                                                                    ->disabled()
                                                                    ->dehydrated(false),
                                                            ]),

                                                        FileUpload::make('youth_photo')
                                                            ->label('Foto Ketua Karang Taruna')
                                                            ->image()
                                                            ->disk('public')
                                                            ->directory('village-profile/karang-taruna')
                                                            ->visibility('public')
                                                            ->columnSpanFull(),

                                                        self::contentBuilder('youth_content', 'village-profile/karang-taruna/content'),
                                                    ]),
                                            ])
                                            ->columnSpanFull(),
                                    ]),

                                Section::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'peta'",
                                        'x-cloak' => 'x-cloak',
                                    ])
                                    ->schema([
                                        Tabs::make('Peta Dusun Tabs')
                                            ->tabs([
                                                Tab::make('Content')
                                                    ->schema([
                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('map_title')
                                                                    ->label('Title')
                                                                    ->default('Peta Dusun')
                                                                    ->disabled()
                                                                    ->dehydrated(false),

                                                                TextInput::make('map_slug')
                                                                    ->label('Slug')
                                                                    ->default('peta-dusun')
                                                                    ->disabled()
                                                                    ->dehydrated(false),
                                                            ]),

                                                        FileUpload::make('map_photo')
                                                            ->label('Gambar Peta Dusun')
                                                            ->image()
                                                            ->disk('public')
                                                            ->directory('village-profile/peta')
                                                            ->visibility('public')
                                                            ->columnSpanFull(),

                                                        TextInput::make('map_link')
                                                            ->label('Link Google Maps')
                                                            ->placeholder('https://maps.app.goo.gl/...')
                                                            ->url()
                                                            ->suffixIcon('heroicon-m-map')
                                                            ->columnSpanFull(),

                                                        self::contentBuilder('map_content', 'village-profile/peta/content'),
                                                    ]),
                                            ])
                                            ->columnSpanFull(),
                                    ]),

                                Section::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'informasi-singkat'",
                                        'x-cloak' => 'x-cloak',
                                    ])
                                    ->schema([
                                        Tabs::make('Informasi Singkat Tabs')
                                            ->tabs([
                                                Tab::make('Content')
                                                    ->schema([
                                                        Grid::make(2)
                                                            ->schema([
                                                                TextInput::make('village_name')
                                                                    ->label('Nama Dusun')
                                                                    ->placeholder('Dusun Slegrengan Kulon')
                                                                    ->required(),

                                                                TextInput::make('location')
                                                                    ->label('Lokasi')
                                                                    ->placeholder('Desa / Kecamatan / Kabupaten')
                                                                    ->required(),

                                                                TextInput::make('head_name')
                                                                    ->label('Ketua Dusun')
                                                                    ->placeholder('Bapak Nama Ketua Dusun'),

                                                                TextInput::make('youth_head_name')
                                                                    ->label('Ketua Karang Taruna')
                                                                    ->placeholder('Saudara Nama Ketua Karang Taruna'),

                                                                TextInput::make('contact')
                                                                    ->label('Kontak')
                                                                    ->placeholder('08xxxxxxxxxx'),

                                                                Toggle::make('is_visible')
                                                                    ->label('Tampilkan di Website')
                                                                    ->default(true),
                                                            ]),
                                                    ]),
                                            ])
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columnSpan([
                                'default' => 1,
                                'xl' => 9,
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    private static function contentBuilder(string $field, string $directory): Builder
    {
        return Builder::make($field)
            ->label('Content')
            ->addActionLabel('Add to content')
            ->default([])
            ->blocks([
                Block::make('heading')
                    ->label('Heading')
                    ->icon('heroicon-o-bookmark')
                    ->schema([
                        TextInput::make('content')
                            ->label('Content')
                            ->required(),
                    ]),

                Block::make('paragraph')
                    ->label('Paragraph')
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Paragraph')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Block::make('image')
                    ->label('Image')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory($directory)
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('alt')
                            ->label('Alt text')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),
            ])
            ->columnSpanFull();
    }
}