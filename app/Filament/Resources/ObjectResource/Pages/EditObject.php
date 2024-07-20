<?php

namespace App\Filament\Resources\ObjectResource\Pages;

use App\Filament\Resources\ObjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
class EditObject extends EditRecord
{
    protected static string $resource = ObjectResource::class;
    protected static ?string $title = "Edit Object";

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_object_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_object_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted object: {$deletedId}");
                    
                    session()->forget('deleted_object_id');

                    Notification::make()
                        ->title('object deleted')
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
            ->log('Updated object');
    }
}
