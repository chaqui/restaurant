<?php

namespace App\Services;

use App\Models\Producto;

class ProductService
{
    public function getProducts()
    {
        return Producto::all();
    }

    public function getProductById($id)
    {
        return Producto::where('id', $id)->first();
    }
}
