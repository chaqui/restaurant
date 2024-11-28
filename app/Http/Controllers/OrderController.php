<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Producto as ProductoResource;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\OrdenProducto as OrdenProductoResource;
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
        return OrdenProductoResource::collection($products);
    }

    public function changeState(Request $request, $id)
    {
        $this->orderService->changeState($id, $request->estado_id);

        return response()->json(['message' => 'Estado cambiado correctamente']);
    }

    public function getOrder($id)
    {
        $order = $this->orderService->getById($id);
        return new OrderResource($order);
    }

    public function addProduct(Request $request, $id)
    {
        $this->orderService->addProduct($id, $request->producto_id, $request->cantidad);

        return response()->json(['message' => 'Producto agregado correctamente']);
    }

    public function createOrder($mesa_id)
    {
        $order = $this->orderService->createOrder($mesa_id);
        return new OrderResource($order);
    }

    public function removerProduct($id,$idProduct)
    {
        $this->orderService->removeProduct($id, $idProduct);

        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
