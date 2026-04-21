<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'edad',
        'sexo'
    ];

    // Relación: un paciente tiene muchas consultas
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'id_paciente');
    }
}