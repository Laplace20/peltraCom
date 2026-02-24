<?php

namespace App\Filament\Resources\Legalities;

use App\Filament\Resources\Legalities\Pages\CreateLegality;
use App\Filament\Resources\Legalities\Pages\EditLegality;
use App\Filament\Resources\Legalities\Pages\ListLegalities;
use App\Filament\Resources\Legalities\Schemas\LegalityForm;
use App\Filament\Resources\Legalities\Tables\LegalitiesTable;
use App\Models\Legality;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LegalityResource extends Resource
{
    protected static ?string $model = Legality::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Legality';

    public static function form(Schema $schema): Schema
    {
        return LegalityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LegalitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLegalities::route('/'),
            'create' => CreateLegality::route('/create'),
            'edit' => EditLegality::route('/{record}/edit'),
        ];
    }
}
