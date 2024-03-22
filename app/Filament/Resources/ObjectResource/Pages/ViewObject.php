<?php

namespace App\Filament\Resources\ObjectResource\Pages;

use App\Filament\Resources\ObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewObject extends ViewRecord
{
    protected static string $resource = ObjectResource::class;
    protected static ?string $title = "View Object";
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Object'),
        ];
    }
}
