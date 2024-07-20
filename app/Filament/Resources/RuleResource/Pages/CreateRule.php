<?php

namespace App\Filament\Resources\RuleResource\Pages;

use App\Filament\Resources\RuleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRule extends CreateRecord
{
    protected static string $resource = RuleResource::class;
    protected function afterCreate(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Created new rule');
    }

    
}
