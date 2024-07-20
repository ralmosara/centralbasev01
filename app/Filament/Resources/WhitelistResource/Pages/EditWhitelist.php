<?php

namespace App\Filament\Resources\WhitelistResource\Pages;

use App\Filament\Resources\WhitelistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
class EditWhitelist extends EditRecord
{
    protected static string $resource = WhitelistResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_whitelist_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_whitelist_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted whitelist: {$deletedId}");
                    
                    session()->forget('deleted_whitelist_id');

                    Notification::make()
                        ->title('whitelist deleted')
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
            ->log('Updated whitelist');
    }
}
