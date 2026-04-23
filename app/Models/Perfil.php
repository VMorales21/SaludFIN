<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'idPerfil';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'nombre',
        'parentesco',
        'fecha_nacimiento'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function gastos(){
        return $this->hasMany(Gasto::class, 'idPerfil');
    }

    public function consultas(){
        return $this->hasMany(Consulta::class, 'idPerfil');
    }
}