<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Enums\Width;
use Illuminate\Support\Str;
use App\Models\ProjectCategory;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media')
                    ->maxWidth(Width::Full)
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        Grid::make('2')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->disk('projects')
                                    ->directory('thumbnail')
                                    ->image()
                                    ->required(),
                                FileUpload::make('images')
                                    ->disk('projects')
                                    ->multiple()
                                    ->image()
                                    ->maxFiles(3)
                                    ->maxSize(10240),
                            ]),
                        \Filament\Forms\Components\Repeater::make('embed')
                            ->schema([
                                TextInput::make('url')
                                    ->url()
                                    ->placeholder('Paste link (YouTube, Instagram, TikTok, Spotify)')
                                    ->required(),
                            ])
                            ->columnSpanFull()
                            ->reorderable()
                            ->addActionLabel('Add Embed')
                            ->label('Project Embeds (YouTube, Instagram, TikTok, etc.)'),
                    ]),

                Section::make('Basics')
                    ->maxWidth(Width::Full)
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('titleID')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slugID', Str::slug($state))),
                                TextInput::make('titleEN')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slugEN', Str::slug($state))),
                                TextInput::make('slugID')->unique(ignoreRecord: true)->required(),
                                TextInput::make('slugEN')->unique(ignoreRecord: true)->required(),
                            ]),
                        Select::make('project_category_id')
                            ->label('Category')
                            ->options(ProjectCategory::all()->pluck('nameEN', 'id'))
                            ->required(),
                        RichEditor::make('descriptionID')
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
                            ->fileAttachmentsDisk('projects')
                            ->fileAttachmentsDirectory('description')
                            ->required(),
                        RichEditor::make('descriptionEN')
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
                            ->fileAttachmentsDisk('projects')
                            ->fileAttachmentsDirectory('description')
                            ->required(),
                    ]),
            ]);
    }
}
