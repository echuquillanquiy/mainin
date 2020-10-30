<?php

namespace App\Imports;

use Throwable;
use App\Colaborador;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ColaboradorsImport implements 
    ToModel, 
    WithHeadingRow, 
    SkipsOnError, 
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Colaborador([
          'user_id' => $row['entrevistador'],
          'nombres' => $row['nombres'],
          'apellidos' => $row['apellidos'],
          'categoria' => $row['categoria'],
          'monto' => $row['monto'],
          'area' => $row['area'],
          'departamento_id' => $row['departamento_cod'],
          'provincia_id' => $row['provincia_cod'],
          'distrito_id' => $row['distrito_cod'],
          'ubigeo_cod' => $row['ubigeo_cod'],
          'puesto' => $row['puesto'],
          'documento' => $row['tipo_documento'],
          'ndocumento' => $row['numero_documento'],
          'fechanac' => $row['fecha_nacimiento'],
          'telefono' => $row['telefono'],
          'direccion' => $row['direccion'],
          'observaciones' => $row['observaciones'],
          'correo' => $row['correo'],
          'respirador' => $row['respirador'],
          'zapatos' => $row['zapatos'],
          'peso' => $row['peso'],
          'talla' => $row['talla'],
          'imc' => $row['imc'],
          'diagnutricion' => $row['dx_nutricion'],
          'tallazapato' => $row['talla_zapato'],
          'tallapantalon' => $row['talla_pantalon'],
          'tallacamisa' => $row['talla_camisa'],
          'sexo' => $row['sexo'],
          'sanguineo' => $row['tipo_sangre'],
          'estadocivil' => $row['estado_civil'],
          'hijos' => $row['hijos'],
          'telemeergencia' => $row['telefono_emergencia'],
          'contacto' => $row['nombre_contacto'],
          'tiempocasa' => $row['tiempo_en_casa'],
          'instruccion' => $row['grado_instruccion'],
          'especialidad' => $row['especialidad'],
          'cuentabancaria' => $row['cuentabancaria'],
          'banco' => $row['banco'],
          'inicioinduccion' => $row['inicio_induccion'],
          'fininduccion' => $row['fin_induccion'],
          'lugarinduccion' => $row['lugar_induccion'],
          'comentarios' => $row['comentarios'],
          'medio' => $row['donde_se_entero'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.numero_documento' => ['unique:colaboradors,ndocumento'],
            '*.correo' => ['unique:colaboradors,correo']
        ];
    }
}
