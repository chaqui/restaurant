<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa as MesaModel;
use App\Http\Resources\Mesa as MesaResource;
use App\Http\Resources\Order as OrderResource;
use App\Services\MesaService;
use App\Services\OrderService;

class MesaController extends Controller
{
    private OrderService $orderService;
    private MesaService $mesaService;

    public function __construct(OrderService $orderService, MesaService $mesaService)
    {
        $this->orderService = $orderService;
        $this->mesaService = $mesaService;
    }
    public function index()
    {
        $mesas = $this->mesaService->getMesas();
        return MesaResource::collection($mesas);
    }

    public function store(Request $request)
    {
        $mesa = $this->mesaService->createMesa($request->all());
        return new MesaResource($mesa);
    }

    public function show(MesaModel $mesa)
    {
        return new MesaResource(resource: $mesa);
    }

    public function update(Request $request, MesaModel $mesa)
    {
        $mesa = $this->mesaService->updateMesa($mesa, $request->all());
        return new MesaResource($mesa);
    }

    public function destroy(MesaModel $mesa)
    {
        $this->mesaService->deleteMesa($mesa);
        return response()->json(null, 204);
    }

    public function getOrders($id)
    {
        $orders = $this->orderService->getOrdersByTableId($id);
        return OrderResource::collection($orders);
    }
}
