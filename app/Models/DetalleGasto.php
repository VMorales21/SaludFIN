<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleGasto extends Model
{
    protected $table = 'detalle_gastos';
    protected $primaryKey = 'idDetalle';
    public $timestamps = false;

    protected $fillable = [
        'idGasto',
        'concepto',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function gasto(){
        return $this->belongsTo(Gasto::class, 'idGasto');
    }
}