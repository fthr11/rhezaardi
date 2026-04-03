<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Enums\Width;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Image')
                    ->maxWidth(Width::Full)
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        // Thumbnail
                        FileUpload::make('thumbnail')
                            ->disk('blogs')
                            ->directory('thumbnail')
                            ->image()
                            ->required(),

                        // Multiple Images
                        FileUpload::make('images')
                            ->disk('blogs')
                            ->multiple()
                            ->maxFiles(2)
                            ->maxSize(10240)
                            ->image()
                    ]),
                Section::make('Blog')
                    ->maxWidth(Width::Full)
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        // Title & Slug
                        Grid::make(2)
                            ->schema([
                                TextInput::make('titleID')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn(Set $set, ?string $state) =>
                                        $set('slugID', Str::slug($state))
                                    ),

                                TextInput::make('titleEN')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn(Set $set, ?string $state) =>
                                        $set('slugEN', Str::slug($state))
                                    ),

                                TextInput::make('slugID')
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->readOnly(),



                                TextInput::make('slugEN')
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->readOnly(),


                            ]),

                        // Content
                        RichEditor::make('contentID')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h1',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'undo',
                            ])
                            ->fileAttachmentsDisk('blogs')
                            ->fileAttachmentsDirectory('content')
                            ->required(),

                        RichEditor::make('contentEN')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h1',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'undo',
                            ])
                            ->fileAttachmentsDisk('blogs')
                            ->fileAttachmentsDirectory('content')
                            ->required(),

                        // Tags
                        TagsInput::make('tags')
                            ->required(),

                        TextInput::make('embed')
                            ->required()
                    ])
            ]);
    }
}