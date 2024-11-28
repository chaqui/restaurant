<?php

namespace App\Services;
use Carbon\Carbon;

use App\Models\Orders;
use App\Models\OrdenProducto;
use App\States\ContextState;
use App\Utils\Constants\States;
use App\Utils\Constants\Tiempos;


class OrderService
{
    public function getOrdersByTableId($id)
    {
        return Orders::where('mesa_id', $id)->get();
    }

    private function getOrdersByStates($states){
        return Orders::whereIn('estado_id', $states)->get();
    }


    public function createOrder($mesaId)
    {
        $ordenes = $this->getOrdersByStates([States::OPEN, States::IN_KITCHEN, States::SERVED]);
        if($ordenes->count() > 0){
            return $ordenes->first();
        }
        $tiempo = $this->isBeforeSixPM() ? Tiempos::ALMUERZO  : Tiempos::CENA;
        return Orders::create([
            'mesa_id' => $mesaId,
            'total' => 0,
            'tiempo_id' => $tiempo,
            'estado_id' => 1
        ]);
    }

    private function isBeforeSixPM()
    {
        $currentTime = Carbon::now();
        $sixPM = Carbon::createFromTime(18, 0, 0);

        return $currentTime->lessThan($sixPM);
    }

    public function addProduct($orden_id, $productId, $cantidad): void
    {
        OrdenProducto::create(attributes: [
            'orders_id' => $orden_id,
            'producto_id' => $productId,
            'cantidad' => $cantidad
        ]);
    }


    public function getById($id)
    {
        return Orders::where('id', $id)->first();
    }

    public function changeState($id, $id_state)
    {
        $order = Orders::where('id', $id)->first();
        $context = new ContextState($id_state);
        $context->handle($order);
    }

    public function removeProduct($id, $productId)
    {
        $orderProducto = OrdenProducto::where('orders_id', $id)->where('producto_id', $productId);
        if ($orderProducto->cantidad > 0) {
            $orderProducto->cantidad -= 1;
            $orderProducto->save();
        }
    }
}
