<?php
namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use App\Models\News;

use Filament\Schemas\Schema; 

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Judul Berita')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),

            TextInput::make('slug')
                ->label('URL Slug')
                ->required()
                ->disabled()
                ->dehydrated()
                ->unique(News::class, 'slug', ignoreRecord: true),

            RichEditor::make('content')
                ->label('Isi Berita')
                ->required()
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('news-content')
                ->fileAttachmentsVisibility('public')
                ->columnSpanFull(),

            FileUpload::make('image')
                ->label('Gambar Utama')
                ->image()
                ->disk('public')
                ->directory('news')
                ->imageEditor(), 

            TextInput::make('youtube_id')
                ->label('Link YouTube')
                ->placeholder('Masukkan URL video YouTube di sini')
                ->helperText('Contoh: https://www.youtube.com/watch?v=xxxx'),

            Select::make('category')
                ->label('Kategori')
                ->options([
                    'news' => 'Berita Umum',
                    'csr' => 'CSR Activity',
                ])
                ->default('news')
                ->required()
                ->live(),

            DatePicker::make('date')
                ->label('Tanggal Kegiatan (Khusus CSR)')
                ->visible(fn (callable $get) => $get('category') === 'csr'),

            DateTimePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->default(now()),

            Toggle::make('is_active')
                ->label('Aktif / Publikasikan')
                ->default(true)
                ->onColor('success')
                ->offColor('danger'),
        ]);
    }
}