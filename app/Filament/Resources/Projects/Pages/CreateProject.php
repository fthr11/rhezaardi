<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    public function getMaxContentWidth(): Width|string|null
    {
        return Width::Full;
    }
}
