<?php

namespace App\Filament\Resources\ProcurementResource\Pages;

use App\Filament\Resources\ProcurementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProcurement extends CreateRecord
{
    protected static string $resource = ProcurementResource::class;
    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new procurement');
    }
}



