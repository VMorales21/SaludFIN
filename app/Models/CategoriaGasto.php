<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaGasto extends Model
{
    protected $table = 'categorias_gasto';
    protected $primaryKey = 'idCategoria';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'nombre',
        'descripcion'
    ];

    public function gastos(){
        return $this->hasMany(Gasto::class, 'idCategoria');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}