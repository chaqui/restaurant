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
}
