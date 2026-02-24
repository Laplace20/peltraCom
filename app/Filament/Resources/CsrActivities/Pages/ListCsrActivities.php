<?php

namespace App\Filament\Resources\CsrActivities\Pages;

use App\Filament\Resources\CsrActivities\CsrActivityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCsrActivities extends ListRecords
{
    protected static string $resource = CsrActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
