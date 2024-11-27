<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'mesa_id' => $this->mesa_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'estado_id'=>$this->estado_id,
            'estado_nombre'=>$this->estado->name,
            'tiempo_id'=>$this->tiempo_id,
            'tiempo_nombre'=>$this->tiempo->nombre,
            'total'=>$this->total,
        ];
    }
}
