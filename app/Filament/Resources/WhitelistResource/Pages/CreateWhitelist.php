<?php

namespace App\Filament\Resources\WhitelistResource\Pages;

use App\Filament\Resources\WhitelistResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWhitelist extends CreateRecord
{
    protected static string $resource = WhitelistResource::class;

    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new whitelist');
    }
}
