<?php

namespace App\Filament\Resources\WhitelistResource\Pages;

use App\Filament\Resources\WhitelistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhitelists extends ListRecords
{
    protected static string $resource = WhitelistResource::class;

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
            ->log('Viewed list of whitelists');
    }
}
