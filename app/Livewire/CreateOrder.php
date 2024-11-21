<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\OrderProductoService;
use Illuminate\Support\Facades\Log;

class CreateOrder extends Component
{


    public $mesaId;
    public $productos;
    public $ordenesProducto = [];

    private $orderService;
    private $productService;
    private $orderProductoService;

    private $order;

    public function mount($mesaId)
    {
        Log::info('mount');
        $this->initializeServices();
        $this->ordenesProducto = [];
        $this->mesaId = $mesaId;

        $this->productos = $this->productService->getProducts();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function addProduct($id_producto)
    {
        $this->initializeServices();
        Log::info('addProduct');
        Log::info(gettype($this->orderService));
        $this->order = $this->orderService->createOrder($this->mesaId);
        $productos = $this->order->productos;

        $noExiste = true;
        if($productos != null){
            foreach ($productos as $producto) {
                if ($producto->id == $id_producto) {
                    $noExiste = false;
                    break;
                }
            }
        }

        if ($noExiste) {
            $this->orderService->addProduct($this->order->id, $id_producto);
        }
        $this->ordenesProducto = $this->orderProductoService->getProductsByOrderId($this->order->id);
    }

    private function initializeServices()
    {
        $this->orderService = new OrderService();
        $this->productService = new ProductService();
        $this->orderProductoService = new OrderProductoService();
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
