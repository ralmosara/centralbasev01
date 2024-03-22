<?php

namespace App\Filament\Resources\ObjectResource\Pages;

use App\Filament\Resources\ObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditObject extends EditRecord
{
    protected static string $resource = ObjectResource::class;
    protected static ?string $title = "Edit Object";

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()->label('View Object'),
            Actions\DeleteAction::make()->label('Delete Object'),
        ];
    }
}
