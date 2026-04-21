<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $table = 'tratamientos';
    protected $primaryKey = 'id_tratamiento';

    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    //  Relación: un tratamiento tiene muchas consultas
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'id_tratamiento');
    }
}