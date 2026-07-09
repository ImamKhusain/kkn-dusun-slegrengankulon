<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns([
                'default' => 1,
                'xl' => 12,
            ])
            ->components([
                Section::make()
                    ->schema([
                        Tabs::make('Post')
                            ->tabs([
                                Tab::make('Title')
                                    ->schema([
                                        TextInput::make('title')
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

                                        Select::make('post_category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Tab::make('Content')
                                    ->schema([
                                        Builder::make('content')
                                            ->label('')
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

                                                Block::make('image')
                                                    ->label('Image')
                                                    ->icon('heroicon-o-photo')
                                                    ->schema([
                                                        FileUpload::make('image')
                                                            ->label('Image')
                                                            ->image()
                                                            ->disk('public')
                                                            ->directory('posts/content')
                                                            ->visibility('public')
                                                            ->required()
                                                            ->columnSpanFull(),

                                                        TextInput::make('alt')
                                                            ->label('Alt text')
                                                            ->maxLength(255)
                                                            ->columnSpanFull(),
                                                    ]),
                                            ])
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columnSpanFull(),

                        Hidden::make('status')
                            ->default('published'),
                    ])
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

                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),

                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('posts/thumbnails')
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),

                        TagsInput::make('tags')
                            ->label('Tags')
                            ->placeholder('New tag')
                            ->columnSpanFull(),

                        DateTimePicker::make('published_at')
                            ->label('Published at')
                            ->default(now())
                            ->native(false)
                            ->seconds(false)
                            ->columnSpanFull(),

                        Textarea::make('meta_description')
                            ->label('Meta description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan([
                        'default' => 1,
                        'xl' => 4,
                    ]),
            ]);
    }
}