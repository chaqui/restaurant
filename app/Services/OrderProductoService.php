<?php
namespace App\Services;
use App\Models\OrdenProducto;
class OrderProductoService
{
    public function getProductsByOrderId($id)
    {
        return OrdenProducto::where('orders_id', $id)->get();
    }

    public function update($id,$cantidad)
    {
        $ordenProducto = OrdenProducto::where('id', $id)->first();
        $ordenProducto->cantidad = $cantidad;
        $ordenProducto->save();
        return $ordenProducto;
    }
}
