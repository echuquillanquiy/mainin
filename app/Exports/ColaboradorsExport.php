<?php

namespace App\Exports;

use App\Colaborador;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ColaboradorsExport implements  
    ShouldAutoSize, 
    WithMapping, 
    WithHeadings,
    WithEvents,
    FromQuery,
    WithDrawings,
    WithCustomStartCell
{
    use Exportable;

    public function query()
    {
        return Colaborador::query()
            ->with('user')
            ->with('departamento')
            ->with('provincia')
            ->with('distrito');
    }

    public function map($colaborador): array
    {
        return [
            $colaborador->id,
            $colaborador->user->name,
            $colaborador->nombres,
            $colaborador->apellidos,
            $colaborador->categoria,
            $colaborador->monto,
            $colaborador->area,
            $colaborador->departamento->name,
            $colaborador->provincia->name,
            $colaborador->distrito->name,
            $colaborador->ubigeo_cod,
            $colaborador->puesto,
            $colaborador->documento,
            $colaborador->ndocumento,
            $colaborador->fechanac,
            $colaborador->telefono,
            $colaborador->direccion,
            $colaborador->observaciones,
            $colaborador->correo,
            $colaborador->respirador,
            $colaborador->zapatos,
            $colaborador->peso,
            $colaborador->talla,
            $colaborador->imc,
            $colaborador->diagnutricion,
            $colaborador->tallazapato,
            $colaborador->tallapantalon,
            $colaborador->tallacamisa,
            $colaborador->sexo, 
            $colaborador->sanguineo,
            $colaborador->estadocivil,
            $colaborador->hijos,
            $colaborador->telemeergencia,
            $colaborador->contacto,
            $colaborador->tiempocasa,
            $colaborador->instruccion, 
            $colaborador->especialidad,
            $colaborador->cuentabancaria, 
            $colaborador->banco, 
            $colaborador->inicioinduccion,
            $colaborador->fininduccion,
            $colaborador->lugarinduccion,
            $colaborador->comentarios,
            $colaborador->medio, 
            $colaborador->estado,
            $colaborador->created_at,
        ];
    }

    public function headings(): array
    {
        return[
          '#',
          'Entrevistador',
          'Nombres',
          'Apellidos',
          'Categoría',
          'Monto',
          'Área',
          'Departamento',
          'Provincia',
          'Distrito',
          'Ubigeo',
          'Puesto',
          'Tipo de Documento',
          'N° Documento',
          'Fecha de Nacimiento',
          'Teléfono',
          'Dirección',
          'Observciones',
          'Correo Electronico',
          'Respirador',
          'Zapatos',
          'Peso',
          'Talla',
          'Imc',
          'Dx Nutrición',
          'Talla de Zapato',
          'Talla Pantalón',
          'Talla Camisa',
          'Sexo',
          'Grupo y Factor',
          'Estado Civil',
          'N° de Hijos',
          'Teléfono de Emergencia',
          'Nombre de Contacto',
          'Tiempo en Casa',
          'Grado de Instrucción',
          'Especialidad',
          'N° de Cuenta Bancaria',
          'Nombre del Banco',
          'Inicio de Inducción',
          'Fin de Inducción',
          'Lugar de Inducción',
          'Comentarios',
          'Donde se entero del Aviso',
          'Estado',
          'Fecha de Creación', 
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('A8:AT100')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A9:AT100')->applyFromArray([
                    'font' => [
                        'bold' => false
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ]);

                $event->getSheet()->getDelegate()->getStyle('A8:AT100')
                    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            }
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Mainin');
        $drawing->setDescription('Mainin Sac');
        $drawing->setPath(public_path('/img/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function startCell(): string
    {
        return 'A8';
    }
    
}
