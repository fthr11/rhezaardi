<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    public function getMaxContentWidth(): Width|string|null
    {
        return Width::Full;
    }
}
