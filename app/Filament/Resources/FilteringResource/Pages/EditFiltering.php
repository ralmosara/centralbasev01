<?php

namespace App\Filament\Resources\FilteringResource\Pages;

use App\Filament\Resources\FilteringResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditFiltering extends EditRecord
{
    protected static string $resource = FilteringResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_filter_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_filter_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted filter: {$deletedId}");
                    
                    session()->forget('deleted_filter_id');

                    Notification::make()
                        ->title('filter deleted')
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
            ->log('Updated filter');
    }
}
