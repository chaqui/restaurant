<?php

namespace App\Filament\Resources\OrdersResource\Pages;

use App\Filament\Resources\OrdersResource;
use App\Models\Orders;
use App\Models\Estado;
use App\Models\OrdenProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\Log;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrders extends EditRecord
{
    protected static string $resource = OrdersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->
             label('Eliminar'),
            Actions\Action::make("Cobrar")
                ->action(function (array $data, Orders $record): void {
                    Log::info($record);
                    $estado = Estado::find(3);
                    $record->estado()->associate($estado);
                    $ordenes = OrdenProducto::where('orders_id', $record->id)->get();
                    $total = 0;
                    foreach ($ordenes as $orden) {
                        $producto = Producto::find($orden->producto_id);
                        $total += $producto->precio * $orden->cantidad;
                    }
                    $record->total = $total;
                    $record->save();
                    $this->fillForm();
                })
                ->requiresConfirmation()

                ->button(),
        ];
    }
}
