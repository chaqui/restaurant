<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Mesa;

class Ordenes extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static string $view = 'filament.pages.ordenes';

    public $mesas;

    public function mount()
    {

        $this->mesas = Mesa::all();
    }
}
