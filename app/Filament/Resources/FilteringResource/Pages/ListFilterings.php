<?php

namespace App\Filament\Resources\FilteringResource\Pages;

use App\Filament\Resources\FilteringResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilterings extends ListRecords
{
    protected static string $resource = FilteringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
