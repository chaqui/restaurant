<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\OrdenProducto;
use Carbon\Carbon;
use League\CommonMark\Node\Query\OrExpr;

class OrderService
{
    public function getOrdersByTableId($id)
    {
        return Orders::where('mesa_id', $id)->get();
    }

    public function createOrder($mesaId = null)
    {
        $orders = Orders::where(['mesa_id', $mesaId], ['estado_id', '<>', '3'])->get();
        if ($orders->count() > 0) {
            return $orders->first();
        }
        return $this->createOrderIfNotExist($mesaId);
    }

    private function createOrderIfNotExist($mesaId)
    {
        $tiempo = $this->isBeforeSixPM() ? 1 : 2;
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

    public function addProduct($orden_id, $productId): void
    {
        OrdenProducto::create([
            'orders_id' => $orden_id,
            'producto_id' => $productId,
            'cantidad' => 1
        ]);
    }

    public function update($id, $data)
    {
        return Orders::where('id', $id)->update($data);
    }

    public function getById($id)
    {
        return Orders::where('id', $id)->first();
    }


}
