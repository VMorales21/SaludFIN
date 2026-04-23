<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gastos';
    protected $primaryKey = 'idGasto';
    public $timestamps = false;

    protected $fillable = [
        'idPerfil',
        'idCategoria',
        'descripcion',
        'monto',
        'fecha',
        'comprobante'
    ];

    public function perfil(){
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }

    public function categoria(){
        return $this->belongsTo(CategoriaGasto::class, 'idCategoria');
    }

    public function detalles(){
        return $this->hasMany(DetalleGasto::class, 'idGasto');
    }
}