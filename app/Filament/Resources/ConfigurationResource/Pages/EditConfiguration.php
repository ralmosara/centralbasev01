<?php

namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditConfiguration extends EditRecord
{
    protected static string $resource = ConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_procurement_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_procurement_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted procurement: {$deletedId}");
                    
                    session()->forget('deleted_procurement_id');

                    Notification::make()
                        ->title('Procurement deleted')
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
            ->log('Updated procurment');
    }
    

}
