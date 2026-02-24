<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\News;
use App\Models\Facility;
use App\Models\Legality;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', News::count())
                ->description('Jumlah berita terdaftar')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Fasilitas', Facility::count())
                ->description('Fasilitas tersedia')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary'),
            Stat::make('Legalitas', Legality::count())
                 ->description('Dokumen legalitas')
                 ->descriptionIcon('heroicon-m-document-text')
                 ->color('warning'),
        ];
    }
}
