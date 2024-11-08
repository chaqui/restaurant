<?php

namespace App\Filament\Resources\OrdersResource\Pages;

use App\Filament\Resources\OrdersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Estado;
use App\Models\Orders;
use Filament\Actions\CreateAction;
use Illuminate\Support\Facades\Log;
class ListOrders extends ListRecords
{
    protected static string $resource = OrdersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label(label: 'Nueva Orden')
            ->createAnother(condition: false),
        ];
    }
}
