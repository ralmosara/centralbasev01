<?php

namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfigurations extends ListRecords
{
    protected static string $resource = ConfigurationResource::class;

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
