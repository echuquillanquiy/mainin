<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
