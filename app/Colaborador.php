<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $fillable = [
        'user_id',
        'nombres',
        'apellidos',
        'categoria',
        'monto',
        'area',
        'departamento_id',
        'provincia_id',
        'distrito_id',
        'ubigeo_cod',
        'puesto',
        'documento',
        'ndocumento',
        'fechanac',
        'telefono',
        'direccion',
        'observaciones',
        'correo',
        'respirador',
        'zapatos',
        'peso',
        'talla',
        'imc',
        'diagnutricion',
        'tallazapato',
        'tallapantalon',
        'tallacamisa',
        'sexo',
        'sanguineo',
        'estadocivil',
        'hijos',
        'telemeergencia',
        'contacto',
        'tiempocasa',
        'instruccion',
        'especialidad',
        'cuentabancaria',
        'banco',
        'inicioinduccion',
        'fininduccion',
        'lugarinduccion',
        'comentarios',
        'medio',
        'foto',
        'estado',
    ];

    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class)->withDefault();
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class)->withDefault();
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class)->withDefault();
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class)->withDefault();
    }

}
