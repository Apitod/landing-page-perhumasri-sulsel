<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodeResource\Pages;
use App\Models\Periode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PeriodeResource extends Resource
{
    protected static ?string $model = Periode::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Periode Kepengurusan';
    protected static ?string $navigationGroup = 'Pengurus';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Periode';
    protected static ?string $pluralModelLabel = 'Periode';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Periode')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Periode')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Contoh: Periode Pertama')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('tahun_mulai')
                        ->label('Tahun Mulai')
                        ->required()
                        ->numeric()
                        ->minValue(2000)
                        ->maxValue(2100),

                    Forms\Components\TextInput::make('tahun_selesai')
                        ->label('Tahun Selesai')
                        ->numeric()
                        ->minValue(2000)
                        ->maxValue(2100)
                        ->nullable(),

                    Forms\Components\Toggle::make('is_aktif')
                        ->label('Periode Aktif')
                        ->helperText('Tandai sebagai periode yang sedang berjalan.')
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('keterangan')
                        ->label('Keterangan')
                        ->rows(3)
                        ->nullable()
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Periode')
                    ->searchable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('tahun_mulai')
                    ->label('Tahun Mulai')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tahun_selesai')
                    ->label('Tahun Selesai')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_aktif')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('penguruses_count')
                    ->label('Jml Pengurus')
                    ->counts('penguruses'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ->defaultSort('tahun_mulai', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPeriodes::route('/'),
            'create' => Pages\CreatePeriode::route('/create'),
            'edit'   => Pages\EditPeriode::route('/{record}/edit'),
        ];
    }
}
