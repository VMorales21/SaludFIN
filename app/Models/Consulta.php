<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';

    public $timestamps = false;

    protected $fillable = [
        'id_paciente',
        'id_enfermedad',
        'id_tratamiento',
        'id_medico',
        'fecha',
        'costo_total'
    ];

    //  Relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class, 'id_enfermedad');
    }

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'id_tratamiento');
    }

    public function detalleCostos()
    {
        return $this->hasMany(DetalleCosto::class, 'id_consulta');
    }
}