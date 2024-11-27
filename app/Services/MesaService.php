<?php

namespace App\Services;
use App\Models\Mesa;

class MesaService
{
    public function getMesas()
    {
        return Mesa::all();
    }

    public function getMesaById($id)
    {
        return Mesa::where('id', $id)->first();
    }

    public function createMesa($data)
    {
        return Mesa::create($data);
    }

    public function updateMesa($mesa, $data)
    {
        $mesa->update($data);
        return $mesa;
    }

    public function deleteMesa($mesa)
    {
        $mesa->delete();
    }
}
