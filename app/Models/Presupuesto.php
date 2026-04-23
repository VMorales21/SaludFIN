<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'idPresupuesto';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'nombre',
        'monto_limite',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}