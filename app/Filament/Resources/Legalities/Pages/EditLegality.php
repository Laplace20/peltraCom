<?php

namespace App\Filament\Resources\Legalities\Pages;

use App\Filament\Resources\Legalities\LegalityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLegality extends EditRecord
{
    protected static string $resource = LegalityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
