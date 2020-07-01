<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
