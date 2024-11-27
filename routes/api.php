<?php

use Illuminate\Support\Facades\Route;

//rutas de mesas
Route::resource(name: 'mesas', controller: App\Http\Controllers\MesaController::class);
Route::get('/mesas/{id}/orders', 'App\Http\Controllers\MesaController@getOrders');

//rutas de productos
Route::resource(name: 'productos', controller: App\Http\Controllers\ProductoController::class);
Route::get('/orders/{id}/productos', 'App\Http\Controllers\OrderController@getProducts');
