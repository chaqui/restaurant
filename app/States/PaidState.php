<?php

namespace App\States;
use App\Utils\Constants\States;
use App\Services\OrderProductoService;

class PaidState extends PrincipalState implements State
{

    private $orderProductService;

    public function __construct()
    {
        $this->orderProductService = new OrderProductoService();
        parent::__construct(States::OPEN, States::PAID);
    }
    public function handle($order)
    {
        $total = 0;
        $this->orderProductService->getProductsByOrderId($order->id)->each(function ($product) use (&$total) {
            $total += $product->producto->precio * $product->cantidad;
        });
        $order->total = $total;
        parent::handle($order);
    }
}
