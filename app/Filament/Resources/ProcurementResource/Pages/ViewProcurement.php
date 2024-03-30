<?php

namespace App\Filament\Resources\ProcurementResource\Pages;

use App\Filament\Resources\ProcurementResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProcurement extends ViewRecord
{
    protected static string $resource = ProcurementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
