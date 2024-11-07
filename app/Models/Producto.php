<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','descripcion','imagen','tipo_id'];
    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function orders()
    {
        return $this->hasMany(OrdenProducto::class);
    }
}
