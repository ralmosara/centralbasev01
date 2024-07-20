<?php

namespace App\Filament\Resources\FilteringResource\Pages;

use App\Filament\Resources\FilteringResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFiltering extends CreateRecord
{
    protected static string $resource = FilteringResource::class;

    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new filter');
    }
}
