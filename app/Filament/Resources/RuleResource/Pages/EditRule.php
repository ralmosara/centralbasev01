<?php

namespace App\Filament\Resources\RuleResource\Pages;

use App\Filament\Resources\RuleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditRule extends EditRecord
{
    protected static string $resource = RuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function () {
                    session(['deleted_rule_id' => $this->record->id]);
                })
                ->after(function () {
                    $deletedId = session('deleted_rule_id');
                    activity()
                        ->causedBy(auth()->user())
                        ->performedOn($this->record)
                        ->log("Deleted rule: {$deletedId}");
                    
                    session()->forget('deleted_rule_id');

                    Notification::make()
                        ->title('rule deleted')
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
            ->log('Updated rule');
    }
}
