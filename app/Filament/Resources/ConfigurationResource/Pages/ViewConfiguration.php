<?php
namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Resources\Pages\ViewRecord;


class ViewConfiguration extends ViewRecord
{
    protected static string $resource = ConfigurationResource::class;
  
    protected function mutateRecord($record)
    {
        $this->logViewActivity($record);
        return parent::mutateRecord($record);
    }

    protected function logViewActivity($record)
    {
        activity()
            ->causedBy(auth()->user())
            ->performedOn($record)
            ->log("Viewed configuration: {$record->id}");
    }
}