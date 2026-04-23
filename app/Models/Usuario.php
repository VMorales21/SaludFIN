<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'correo',
        'password'
    ];

    // RELACIONES
    public function perfiles(){
        return $this->hasMany(Perfil::class, 'idUsuario');
    }

    public function ingresos(){
        return $this->hasMany(Ingreso::class, 'idUsuario');
    }

    public function presupuestos(){
        return $this->hasMany(Presupuesto::class, 'idUsuario');
    }

    public function alertas(){
        return $this->hasMany(Alerta::class, 'idUsuario');
    }
}