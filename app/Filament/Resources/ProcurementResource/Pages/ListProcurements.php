<?php

namespace App\Filament\Resources\ProcurementResource\Pages;

use App\Filament\Resources\ProcurementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcurements extends ListRecords
{
    protected static string $resource = ProcurementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }  
    public function mount(): void
    {
        parent::mount();

        activity()
            ->causedBy(auth()->user())
            ->log('Viewed list of procurements');
    }

}
