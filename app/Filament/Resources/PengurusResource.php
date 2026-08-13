<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusResource\Pages;
use App\Models\Pengurus;
use App\Models\Periode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Daftar Pengurus';
    protected static ?string $navigationGroup = 'Pengurus';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Pengurus';
    protected static ?string $pluralModelLabel = 'Pengurus';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Pengurus')
                ->schema([
                    Forms\Components\Select::make('periode_id')
                        ->label('Periode')
                        ->relationship('periode', 'nama')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('jabatan')
                        ->label('Jabatan')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Contoh: Ketua, Sekretaris, Bendahara'),

                    Forms\Components\TextInput::make('bidang')
                        ->label('Bidang / Divisi')
                        ->nullable()
                        ->maxLength(255)
                        ->placeholder('Contoh: Bidang Pelatihan'),

                    Forms\Components\TextInput::make('instansi')
                        ->label('Instansi / RS Asal')
                        ->nullable()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('urutan')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0)
                        ->helperText('Angka lebih kecil = tampil lebih awal'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Foto')
                ->schema([
                    Forms\Components\FileUpload::make('foto')
                        ->label('Foto Pengurus')
                        ->image()
                        ->imageEditor()
                        ->directory('pengurus')
                        ->nullable()
                        ->helperText('Opsional. Format: JPG, PNG. Maks 2MB.')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(40)
                    ->defaultImageUrl(fn () => 'https://ui-avatars.com/api/?background=1a4fa0&color=fff&size=80'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('bidang')
                    ->label('Bidang')
                    ->searchable()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('periode.nama')
                    ->label('Periode')
                    ->sortable()
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('instansi')
                    ->label('Instansi')
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('periode_id')
                    ->label('Periode')
                    ->relationship('periode', 'nama'),
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
            ->defaultSort('urutan', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit'   => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
