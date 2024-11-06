<?php

namespace App\Filament\Resources\TiempoResource\Pages;

use App\Filament\Resources\TiempoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTiempos extends ListRecords
{
    protected static string $resource = TiempoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
