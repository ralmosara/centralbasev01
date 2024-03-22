<?php

namespace App\Filament\Resources\ObjectResource\Pages;

use App\Filament\Resources\ObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListObjects extends ListRecords
{
    protected static string $resource = ObjectResource::class;
    protected static ?string $pluralModelLabel = "Objects";
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Object'),
        ];
    }
}
