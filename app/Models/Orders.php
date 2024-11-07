<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['total','mesa_id','tiempo_id', 'estado_id'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function tiempo()
    {
        return $this->belongsTo(Tiempo::class);
    }

    public function OrdenProductos()
    {
        return $this->hasMany(OrdenProducto::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
