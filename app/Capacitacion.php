<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected $fillable = [
        'colaborador_id',
        'fechabambas',
        'bambas',
        'fechabrocal',
        'brocal',
        'fechaantapaccay',
        'antapaccay',
    ];
}
