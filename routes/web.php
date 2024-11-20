<?php

use App\Filament\Pages\CreateOrden;
use Illuminate\Support\Facades\Route;
use App\Filament\Pages\OrdenesMesa;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ordenes-mesa/{id}', OrdenesMesa::class)->name('filament.pages.ordenes-mesa');
Route::get('/create-orden/{id}', CreateOrden::class)->name('filament.pages.create-orden');
