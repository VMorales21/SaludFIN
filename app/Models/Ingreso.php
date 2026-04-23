<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';
    protected $primaryKey = 'idIngreso';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'descripcion',
        'monto',
        'fecha'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}