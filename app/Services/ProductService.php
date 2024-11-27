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

    public function createProduct(array $data)
    {
        return Producto::create($data);
    }

    public function updateProduct(array $data, $id)
    {
        return Producto::where('id', $id)->update($data);
    }

    public function deleteProduct($id)
    {
        return Producto::where('id', $id)->delete();
    }
}
