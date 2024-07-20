<?php

namespace App\Filament\Resources\InformationResource\Pages;

use App\Filament\Resources\InformationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInformation extends CreateRecord
{
    protected static string $resource = InformationResource::class;
    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new information');
    }
}
