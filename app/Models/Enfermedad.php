<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table = 'enfermedades';
    protected $primaryKey = 'id_enfermedad';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_categoria'
    ];

    // Relación: una enfermedad tiene muchas consultas
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'id_enfermedad');
    }
}