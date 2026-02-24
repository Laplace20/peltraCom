<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama Fasilitas')
                ->required()
                ->placeholder('Contoh: Dermaga Peti Kemas 01')
                ->maxLength(255),

            RichEditor::make('description')
                ->label('Deskripsi Fasilitas')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('image')
                ->label('Foto Fasilitas')
                ->image()
                ->disk('public')
                ->directory('facilities')
                ->required(),
        ]);
    }
}