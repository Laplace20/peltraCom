<?php

namespace App\Filament\Resources\CsrActivities;

use App\Filament\Resources\CsrActivities\Pages\CreateCsrActivity;
use App\Filament\Resources\CsrActivities\Pages\EditCsrActivity;
use App\Filament\Resources\CsrActivities\Pages\ListCsrActivities;
use App\Filament\Resources\CsrActivities\Schemas\CsrActivityForm;
use App\Filament\Resources\CsrActivities\Tables\CsrActivitiesTable;
use App\Models\CsrActivity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CsrActivityResource extends Resource
{
    protected static ?string $model = CsrActivity::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CsrActivity';

    public static function form(Schema $schema): Schema
    {
        return CsrActivityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CsrActivitiesTable::configure($table);
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
            'index' => ListCsrActivities::route('/'),
            'create' => CreateCsrActivity::route('/create'),
            'edit' => EditCsrActivity::route('/{record}/edit'),
        ];
    }
}
