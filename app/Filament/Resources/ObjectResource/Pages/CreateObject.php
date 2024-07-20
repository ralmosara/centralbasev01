<?php

namespace App\Filament\Resources\ObjectResource\Pages;

use App\Filament\Resources\ObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateObject extends CreateRecord
{
    protected static string $resource = ObjectResource::class;
    protected static ?string $title = "Create Object";
    protected static ?string $pluralModelLabel = "Objects";
    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new object');
    }

}
