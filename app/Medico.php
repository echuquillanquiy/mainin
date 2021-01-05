<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'cpc',
        'colaborador_id',
        'cliente', 
        'fechaexmedico', 
        'levantamientoobs',
        'centromedico',
        'aptitud',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class)->withDefault();
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->withDefault();
    }

}
