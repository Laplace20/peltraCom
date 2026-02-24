<?php
namespace App\Filament\Resources\Legalities\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
// Pastikan import yang ini benar:
use Filament\Schemas\Components\Utilities\Set; 
use Illuminate\Support\Facades\Storage;

class LegalityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Nama Dokumen')
                ->required(),

            FileUpload::make('file_path')
                ->label('Dokumen Utama (PDF/Gambar)')
                ->acceptedFileTypes(['application/pdf', 'image/*'])
                ->disk('public')
                ->directory('legalities')
                ->required(),

            FileUpload::make('images')
                ->label('Galeri Foto Tambahan')
                ->image()
                ->multiple() 
                ->disk('public')
                ->directory('legalities/gallery')
                ->imageEditor()
                ->reorderable() 
                ->appendFiles(), 
                

            Toggle::make('is_visible')
                ->label('Tampilkan di Website')
                ->default(true),
        ]);
    }
}