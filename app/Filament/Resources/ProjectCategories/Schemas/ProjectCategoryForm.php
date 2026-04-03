<?php

namespace App\Filament\Resources\ProjectCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class ProjectCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)
                    ->schema([
                        TextInput::make('nameIndonesia')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slugID', Str::slug($state))),
                        TextInput::make('nameEnglish')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slugEN', Str::slug($state))),
                        TextInput::make('slugID')->unique(ignoreRecord: true)->required()->disabled(),
                        TextInput::make('slugEN')->unique(ignoreRecord: true)->required()->disabled(),
                    ])
            ]);
    }
}
