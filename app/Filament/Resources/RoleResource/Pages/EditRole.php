<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_role_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_role_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted role: {$deletedId}");
                    
                    session()->forget('deleted_role_id');

                    Notification::make()
                        ->title('role deleted')
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
            ->log('Updated role');
    }
    
}
