<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Orders;
use App\Models\Mesa;
class OrdenesMesa extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.ordenes-mesa';

    public $ordenes;

    public $mesaId;

    public $mesa;

    public function mount($id)
    {
        $this->mesaId = $id;
        $this->mesa = Mesa::where('id', $id)->first();

        $this->ordenes = Orders::where('mesa_id', $id)->get();
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
