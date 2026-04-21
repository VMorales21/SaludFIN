<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCosto extends Model
{
    protected $table = 'detalle_costos';
    protected $primaryKey = 'id_detalle';

    public $timestamps = false;

    protected $fillable = [
        'id_consulta',
        'tipo',
        'descripcion',
        'costo'
    ];

    // Relación: pertenece a una consulta
    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'id_consulta');
    }
}