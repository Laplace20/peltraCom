<?php

namespace App\Filament\Resources\Legalities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;

class LegalitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Nama Dokumen')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('file_path')
                    ->label('Pratinjau')
                    ->formatStateUsing(function ($state) {
                        $ext = strtolower(pathinfo($state, PATHINFO_EXTENSION));
                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                            return '<img src="' . asset('storage/' . $state) . '" style="height: 50px; width: auto; object-fit: cover; border-radius: 4px;">';
                        }
                        return '<div style="display: flex; align-items: center; gap: 4px;"><svg style="width: 20px; height: 20px; color: #64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg> <span>Dokumen</span></div>';
                    })
                    ->html(),
                    
                ImageColumn::make('images')
                    ->label('Galeri')
                    ->disk('public')
                    ->stacked() // Menumpuk gambar agar rapi
                    ->limit(3) // Batasi tampilan 3 gambar
                    ->limitedRemainingText() // Teks sisa (+2)
                    ->height(40),

                ToggleColumn::make('is_visible') // Ubah ke ToggleColumn agar bisa edit langsung
                    ->label('Tampil'),
                    
                TextColumn::make('updated_at')
                     ->dateTime()
                     ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
