<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenProducto extends Model
{
    protected $table = 'orden_productos';
    protected $fillable = ['producto_id', 'cantidad'];

    public function orden()
    {
        return $this->belongsTo(Orders::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
