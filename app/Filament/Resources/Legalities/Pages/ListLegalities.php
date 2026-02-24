<?php

namespace App\Filament\Resources\Legalities\Pages;

use App\Filament\Resources\Legalities\LegalityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegalities extends ListRecords
{
    protected static string $resource = LegalityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
