<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\OrdenProducto;
use App\Services\OrderProductoService;


class OrdenProductController extends Controller
{
    private $orderProductoService;

    public function __construct(OrderProductoService $orderProductoService)
    {
        $this->orderProductoService = $orderProductoService;
    }
    public function updateProduct(Request $request,string $id)
    {
        $product = $this->orderProductoService->update($id, $request->cantidad);
        return new OrdenProducto($product);
    }
}
