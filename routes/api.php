<?php

use Illuminate\Support\Facades\Route;

//rutas de mesas
Route::resource(name: 'mesas', controller: App\Http\Controllers\MesaController::class);
Route::get('/mesas/{id}/orders', 'App\Http\Controllers\MesaController@getOrders');
Route::post('/mesas/{mesa_id}/orders', 'App\Http\Controllers\OrderController@createOrder');

//rutas de productos
Route::resource(name: 'productos', controller: App\Http\Controllers\ProductoController::class);
//rutas de ordenes

Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@getOrder');
Route::put('/orders/{id}/status', 'App\Http\Controllers\OrderController@changeState');
Route::get('/orders/{id}/productos', 'App\Http\Controllers\OrderController@getProducts');
Route::post('/orders/{id}/productos', 'App\Http\Controllers\OrderController@addProduct');
Route::put('/orders/productos/{id}', 'App\Http\Controllers\OrdenProductController@updateProduct');
Route::delete('/orders/{id}/productos/{idProduct}', 'App\Http\Controllers\OrderController@removerProduct');

