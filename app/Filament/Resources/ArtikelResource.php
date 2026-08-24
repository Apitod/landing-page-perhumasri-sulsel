<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtikelResource\Pages;
use App\Models\Artikel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Artikel';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Artikel';
    protected static ?string $pluralModelLabel = 'Artikel';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Artikel')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            if ($operation === 'create') {
                                $set('slug', Str::slug($state));
                            }
                        }),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    Forms\Components\Select::make('kategori')
                        ->options([
                            'Artikel'   => 'Artikel',
                            'Liputan'   => 'Liputan',
                            'Berita'    => 'Berita',
                            'Kegiatan'  => 'Kegiatan',
                        ])
                        ->default('Artikel')
                        ->required(),

                    Forms\Components\TextInput::make('penulis')
                        ->maxLength(100),
                ])
                ->columns(2),

            Forms\Components\Section::make('Konten')
                ->schema([
                    Forms\Components\FileUpload::make('gambar')
                        ->image()
                        ->directory('artikel')
                        ->maxSize(5120)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->helperText(
                            '📐 Panduan ukuran gambar agar tidak terpotong: ' .
                            'Artikel/Berita/Liputan → rasio 16:9, rekomendasi 1200×675 px. ' .
                            'Poster/Kegiatan → rasio 3:4 (portrait), rekomendasi 900×1200 px. ' .
                            'Format: JPG, PNG, WebP. Maks 5MB.'
                        )
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('konten')
                        ->required()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Penerbitan')
                ->schema([
                    Forms\Components\Toggle::make('is_published')
                        ->label('Terbitkan')
                        ->default(false)
                        ->live(),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Tanggal Terbit')
                        ->visible(fn (Forms\Get $get) => $get('is_published')),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Foto')
                    ->circular(false)
                    ->size(48),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->weight('semibold'),

                Tables\Columns\BadgeColumn::make('kategori')
                    ->colors([
                        'warning' => 'Artikel',
                        'success' => 'Liputan',
                        'primary' => 'Berita',
                        'secondary' => 'Kegiatan',
                    ]),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Terbit')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Terbit')
                    ->dateTime('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'Artikel'   => 'Artikel',
                        'Liputan'   => 'Liputan',
                        'Berita'    => 'Berita',
                        'Kegiatan'  => 'Kegiatan',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Terbit'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit'   => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
