<?php

namespace App\Filament\Resources\SystemResource\Pages;

use App\Filament\Resources\SystemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSystem extends CreateRecord
{
    protected static string $resource = SystemResource::class;
    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new system');
    }


}
