<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Orders;

class CreateOrden extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.create-orden';

    public $mesaId;

    private $order;

    public function mount($id)
    {
        $this->mesaId = $id;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function addProduct($product)
    {
        if(!$this->order){
            $this->order = Orders::create([
                'mesa_id' => $this->mesaId,

            ]);
        }

        $this->order->products()->attach($product);
    }

    private function createOrder()
    {

        $this->order = Orders::create([
            'mesa_id' => $this->mesaId,
        ]);
    }






}
