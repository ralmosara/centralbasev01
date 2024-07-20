<?php

namespace App\Filament\Resources\InformationResource\Pages;

use App\Filament\Resources\InformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
class EditInformation extends EditRecord
{
    protected static string $resource = InformationResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_information_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_information_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted information: {$deletedId}");
                    
                    session()->forget('deleted_information_id');

                    Notification::make()
                        ->title('information deleted')
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
            ->log('Updated information');
    }
}
