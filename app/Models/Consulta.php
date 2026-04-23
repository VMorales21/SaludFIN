<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'idConsulta';
    public $timestamps = false;

    protected $fillable = [
        'idPerfil',
        'fecha',
        'doctor',
        'motivo',
        'costo'
    ];

    public function perfil(){
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }
}
