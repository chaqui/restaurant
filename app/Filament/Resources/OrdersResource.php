<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Models\Orders;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mesa_id')
                    ->label('Mesa')
                    ->relationship('mesa', 'name'),
                Forms\Components\Select::make('tiempo_id')
                    ->label('Tiempo')
                    ->relationship('tiempo', 'nombre'),
                Forms\Components\TextInput::make('total')
                    ->label('Total')
                    ->numeric()
                    ->default(0)
                    ->prefix('Q')
                    ->inputMode('decimal')
                    ->minValue(0)
                    ->readOnly(),
                Forms\Components\Select::make('estado_id')
                    ->label('Estado')
                    ->relationship('estado', 'name')
                    ->default(state: 1)
                    ->selectablePlaceholder(false)
                    ->disableOptionWhen(function(string $value){
                        return true;
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mesa.name')
                    ->label('Mesa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiempo.nombre')
                    ->label('Tiempo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado.name')
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar')
                    ->disabled(function($record){
                        Log::info($record);
                        return $record->estado_id == 3;
                    }),

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
            RelationManagers\ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route(path: '/{record}/edit'),
        ];
    }
}
