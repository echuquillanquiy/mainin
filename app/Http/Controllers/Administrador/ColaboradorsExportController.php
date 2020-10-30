<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Exports\ColaboradorsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class ColaboradorsExportController extends Controller
{

    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function export()
    {
        return $this->excel->download(new ColaboradorsExport, 'colaboradores.xlsx');
    }
}
