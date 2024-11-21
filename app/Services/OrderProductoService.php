<?php
namespace App\Services;
use App\Models\OrdenProducto;
class OrderProductoService
{
    public function getProductsByOrderId($id)
    {
        return OrdenProducto::where('orden_id', $id)->get();
    }
}
