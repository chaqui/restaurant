<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Producto as ProductoResource;
use App\Services\OrderProductoService;
use App\Services\OrderService;
class OrderController extends Controller
{
    private $orderProductoService;

    private $orderService;

    public function __construct(OrderProductoService $orderProductoService, OrderService $orderService)
    {
        $this->orderProductoService = $orderProductoService;
        $this->orderService = $orderService;
    }
    public function getProducts($id)
    {
        $products = $this->orderProductoService->getProductsByOrderId($id);
        return ProductoResource::collection($products);
    }

    public function addProduct(Request $request, $id)
    {
         $this->orderService->addProduct($id, $request->idProducto);
        return response()->json(['message' => 'Producto agregado correctamente']);
    }

    public function removeProduct(Request $request, $id)
    {
        $this->orderService->removeProduct($id, $request->idProducto);
        return response()->json(['message' => 'Producto eliminado correctamente']);
    }

    public function changeState(Request $request, $id)
    {
        $this->orderService->changeState($id, $request->estado_id);

        return response()->json(['message' => 'Estado cambiado correctamente']);
    }
}
