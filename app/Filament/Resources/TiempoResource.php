<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiempoResource\Pages;
use App\Filament\Resources\TiempoResource\RelationManagers;
use App\Models\Tiempo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiempoResource extends Resource
{
    protected static ?string $model = Tiempo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTiempos::route('/'),
            'create' => Pages\CreateTiempo::route('/create'),
            'edit' => Pages\EditTiempo::route('/{record}/edit'),
        ];
    }
}
