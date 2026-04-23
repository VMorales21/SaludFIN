<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $table = 'alertas';
    protected $primaryKey = 'idAlerta';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'tipo',
        'mensaje',
        'fecha'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}