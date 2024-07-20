<?php

namespace App\Filament\Resources\SystemResource\Pages;

use App\Filament\Resources\SystemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditSystem extends EditRecord
{
    protected static string $resource = SystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_system_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_system_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted system: {$deletedId}");
                    
                    session()->forget('deleted_system_id');

                    Notification::make()
                        ->title('system deleted')
                        ->success()
                        ->send();
                }),
        ];
    }


    protected function afterSave(): void
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($this->record)
            ->log('Updated system');
    }
}
