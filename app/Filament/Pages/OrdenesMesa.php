<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Orders;
use App\Services\MesaService;
use App\Services\OrderService;
class OrdenesMesa extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.ordenes-mesa';

    public $ordenes;

    public $mesaId;

    public $mesa;

    public function mount($id)
    {
        $mesaService = new MesaService();
        $orderService = new OrderService();
        $this->mesaId = $id;
        $this->mesa = $mesaService->getMesaById($id);
        $this->ordenes = $orderService->getOrdersByTableId($id);
    }
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return 'Órdenes de Mesa: ' . $this->mesa->name;
    }
}
