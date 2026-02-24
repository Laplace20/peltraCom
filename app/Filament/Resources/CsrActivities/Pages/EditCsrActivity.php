<?php

namespace App\Filament\Resources\CsrActivities\Pages;

use App\Filament\Resources\CsrActivities\CsrActivityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCsrActivity extends EditRecord
{
    protected static string $resource = CsrActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
