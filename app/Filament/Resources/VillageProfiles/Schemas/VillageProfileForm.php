<?php

namespace App\Filament\Resources\VillageProfiles\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;

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
                        /*
                        |--------------------------------------------------------------------------
                        | SIDEBAR MENU KIRI
                        |--------------------------------------------------------------------------
                        */
                        View::make('filament.components.village-profile-side-menu')
                            ->columnSpan([
                                'default' => 1,
                                'xl' => 3,
                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | FORM KANAN
                        | Dibuat absolute agar semua section muncul dari posisi atas yang sama
                        |--------------------------------------------------------------------------
                        */
                        Grid::make(1)
                            ->extraAttributes([
                                'class' => 'relative min-h-[1200px]',
                            ])
                            ->schema([

                                /*
                                |--------------------------------------------------------------------------
                                | PROFIL DUSUN
                                |--------------------------------------------------------------------------
                                */
                                Group::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'profil'",
                                        'x-cloak' => 'x-cloak',
                                        'class' => 'absolute inset-x-0 top-0 w-full',
                                    ])
                                    ->schema([
                                        Section::make()
                                            ->schema([
                                                Tabs::make('Profil Dusun')
                                                    ->tabs([
                                                        Tab::make('Content')
                                                            ->schema([
                                                                Grid::make(2)
                                                                    ->schema([
                                                                        TextInput::make('title')
                                                                            ->label('Title')
                                                                            ->placeholder('Profil Dusun')
                                                                            ->required()
                                                                            ->maxLength(255),

                                                                        TextInput::make('slug')
                                                                            ->label('Slug')
                                                                            ->placeholder('profil-dusun')
                                                                            ->helperText('Isi manual. Contoh: profil-dusun')
                                                                            ->required()
                                                                            ->unique(ignoreRecord: true)
                                                                            ->maxLength(255),
                                                                    ]),

                                                                FileUpload::make('photo')
                                                                    ->label('Logo / Foto Dusun')
                                                                    ->image()
                                                                    ->disk('public')
                                                                    ->directory('village-profile/profile')
                                                                    ->visibility('public')
                                                                    ->imagePreviewHeight('180')
                                                                    ->columnSpanFull(),

                                                                self::contentBuilder(
                                                                    field: 'content',
                                                                    directory: 'village-profile/profile/content'
                                                                ),
                                                            ]),

                                                        Tab::make('Meta')
                                                            ->schema([
                                                                Toggle::make('is_visible')
                                                                    ->label('Visibility')
                                                                    ->default(true),
                                                            ])
                                                            ->columns(2),
                                                    ])
                                                    ->columnSpanFull(),
                                            ]),
                                    ])
                                    ->columnSpanFull(),

                                /*
                                |--------------------------------------------------------------------------
                                | KETUA DUSUN
                                |--------------------------------------------------------------------------
                                */
                                Group::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'ketua-dusun'",
                                        'x-cloak' => 'x-cloak',
                                        'class' => 'absolute inset-x-0 top-0 w-full',
                                    ])
                                    ->schema([
                                        Section::make()
                                            ->schema([
                                                Tabs::make('Ketua Dusun')
                                                    ->tabs([
                                                        Tab::make('Content')
                                                            ->schema([
                                                                Grid::make(2)
                                                                    ->schema([
                                                                        TextInput::make('head_name')
                                                                            ->label('Title')
                                                                            ->placeholder('Contoh: Bapak Udiyono')
                                                                            ->maxLength(255),

                                                                        TextInput::make('head_slug')
                                                                            ->label('Slug')
                                                                            ->placeholder('ketua-dusun')
                                                                            ->helperText('Isi manual. Contoh: ketua-dusun')
                                                                            ->maxLength(255),
                                                                    ]),

                                                                FileUpload::make('head_photo')
                                                                    ->label('Foto Ketua Dusun')
                                                                    ->image()
                                                                    ->disk('public')
                                                                    ->directory('village-profile/ketua-dusun')
                                                                    ->visibility('public')
                                                                    ->imagePreviewHeight('220')
                                                                    ->columnSpanFull(),

                                                                self::contentBuilder(
                                                                    field: 'head_content',
                                                                    directory: 'village-profile/ketua-dusun/content'
                                                                ),
                                                            ]),

                                                        Tab::make('Meta')
                                                            ->schema([
                                                                Toggle::make('is_visible')
                                                                    ->label('Visibility')
                                                                    ->default(true),
                                                            ])
                                                            ->columns(2),
                                                    ])
                                                    ->columnSpanFull(),
                                            ]),
                                    ])
                                    ->columnSpanFull(),

                                /*
                                |--------------------------------------------------------------------------
                                | KETUA KARANG TARUNA
                                |--------------------------------------------------------------------------
                                */
                                Group::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'karang-taruna'",
                                        'x-cloak' => 'x-cloak',
                                        'class' => 'absolute inset-x-0 top-0 w-full',
                                    ])
                                    ->schema([
                                        Section::make()
                                            ->schema([
                                                Tabs::make('Ketua Karang Taruna')
                                                    ->tabs([
                                                        Tab::make('Content')
                                                            ->schema([
                                                                Grid::make(2)
                                                                    ->schema([
                                                                        TextInput::make('youth_head_name')
                                                                            ->label('Title')
                                                                            ->placeholder('Contoh: Ketua Karang Taruna')
                                                                            ->maxLength(255),

                                                                        TextInput::make('youth_slug')
                                                                            ->label('Slug')
                                                                            ->placeholder('ketua-karang-taruna')
                                                                            ->helperText('Isi manual. Contoh: ketua-karang-taruna')
                                                                            ->maxLength(255),
                                                                    ]),

                                                                FileUpload::make('youth_photo')
                                                                    ->label('Foto Ketua Karang Taruna')
                                                                    ->image()
                                                                    ->disk('public')
                                                                    ->directory('village-profile/karang-taruna')
                                                                    ->visibility('public')
                                                                    ->imagePreviewHeight('220')
                                                                    ->columnSpanFull(),

                                                                self::contentBuilder(
                                                                    field: 'youth_content',
                                                                    directory: 'village-profile/karang-taruna/content'
                                                                ),
                                                            ]),

                                                        Tab::make('Meta')
                                                            ->schema([
                                                                Toggle::make('is_visible')
                                                                    ->label('Visibility')
                                                                    ->default(true),
                                                            ])
                                                            ->columns(2),
                                                    ])
                                                    ->columnSpanFull(),
                                            ]),
                                    ])
                                    ->columnSpanFull(),

                                /*
                                |--------------------------------------------------------------------------
                                | PETA DUSUN
                                |--------------------------------------------------------------------------
                                */
                                Group::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'peta'",
                                        'x-cloak' => 'x-cloak',
                                        'class' => 'absolute inset-x-0 top-0 w-full',
                                    ])
                                    ->schema([
                                        Section::make()
                                            ->schema([
                                                Tabs::make('Peta Dusun')
                                                    ->tabs([
                                                        Tab::make('Content')
                                                            ->schema([
                                                                Grid::make(2)
                                                                    ->schema([
                                                                        TextInput::make('map_title')
                                                                            ->label('Title')
                                                                            ->placeholder('Peta Dusun')
                                                                            ->maxLength(255),

                                                                        TextInput::make('map_slug')
                                                                            ->label('Slug')
                                                                            ->placeholder('peta-dusun')
                                                                            ->helperText('Isi manual. Contoh: peta-dusun')
                                                                            ->maxLength(255),
                                                                    ]),

                                                                FileUpload::make('map_photo')
                                                                    ->label('Gambar Peta Dusun')
                                                                    ->image()
                                                                    ->disk('public')
                                                                    ->directory('village-profile/peta')
                                                                    ->visibility('public')
                                                                    ->imagePreviewHeight('220')
                                                                    ->columnSpanFull(),

                                                                TextInput::make('map_link')
                                                                    ->label('Link Google Maps')
                                                                    ->placeholder('https://maps.app.goo.gl/...')
                                                                    ->url()
                                                                    ->suffixIcon('heroicon-m-map')
                                                                    ->columnSpanFull(),

                                                                self::contentBuilder(
                                                                    field: 'map_content',
                                                                    directory: 'village-profile/peta/content'
                                                                ),
                                                            ]),

                                                        Tab::make('Meta')
                                                            ->schema([
                                                                Toggle::make('is_visible')
                                                                    ->label('Visibility')
                                                                    ->default(true),
                                                            ])
                                                            ->columns(2),
                                                    ])
                                                    ->columnSpanFull(),
                                            ]),
                                    ])
                                    ->columnSpanFull(),

                                /*
                                |--------------------------------------------------------------------------
                                | INFORMASI SINGKAT
                                |--------------------------------------------------------------------------
                                */
                                Group::make()
                                    ->extraAttributes([
                                        'x-show' => "activeSection === 'informasi-singkat'",
                                        'x-cloak' => 'x-cloak',
                                        'class' => 'absolute inset-x-0 top-0 w-full',
                                    ])
                                    ->schema([
                                        Section::make()
                                            ->schema([
                                                Tabs::make('Informasi Singkat')
                                                    ->tabs([
                                                        Tab::make('Content')
                                                            ->schema([
                                                                Grid::make(1)
                                                                    ->schema([
                                                                        TextInput::make('village_name')
                                                                            ->label('Nama Dusun')
                                                                            ->placeholder('Dusun Slegrengan Kulon')
                                                                            ->maxLength(255)
                                                                            ->columnSpanFull(),

                                                                        TextInput::make('location')
                                                                            ->label('Lokasi')
                                                                            ->placeholder('Desa / Kecamatan / Kabupaten')
                                                                            ->maxLength(255)
                                                                            ->columnSpanFull(),

                                                                        TextInput::make('head_name')
                                                                            ->label('Ketua Dusun')
                                                                            ->placeholder('Bapak Nama Ketua Dusun')
                                                                            ->maxLength(255)
                                                                            ->columnSpanFull(),

                                                                        TextInput::make('youth_head_name')
                                                                            ->label('Ketua Karang Taruna')
                                                                            ->placeholder('Saudara Nama Ketua Karang Taruna')
                                                                            ->maxLength(255)
                                                                            ->columnSpanFull(),

                                                                        TextInput::make('contact')
                                                                            ->label('Kontak')
                                                                            ->placeholder('08xxxxxxxxxx')
                                                                            ->tel()
                                                                            ->suffixIcon('heroicon-m-phone')
                                                                            ->maxLength(30)
                                                                            ->columnSpanFull(),
                                                                    ]),
                                                            ]),
                                                    ])
                                                    ->columnSpanFull(),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
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
                            ->imagePreviewHeight('220')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('alt')
                            ->label('Alt text')
                            ->placeholder('Keterangan gambar')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),

                Block::make('heading')
                    ->label('Heading')
                    ->icon('heroicon-o-bookmark')
                    ->schema([
                        TextInput::make('content')
                            ->label('Content')
                            ->required(),

                        Select::make('level')
                            ->label('Level')
                            ->placeholder('Select an option')
                            ->options([
                                'h1' => 'Heading 1',
                                'h2' => 'Heading 2',
                                'h3' => 'Heading 3',
                                'h4' => 'Heading 4',
                            ])
                            ->native(false)
                            ->required(),
                    ])
                    ->columns(2),

                Block::make('paragraph')
                    ->label('Paragraph')
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Paragraph')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ])
            ->columnSpanFull();
    }
}