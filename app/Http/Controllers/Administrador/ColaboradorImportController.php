<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Imports\ColaboradorsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ColaboradorImportController extends Controller
{

    public function show()
    {
        return view('colaboradors.import');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $import = new ColaboradorsImport;
        $import->import($file);

        if($import->failures()->isNotEmpty())
        {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Se importo correctamente los colaboradores');
    }
}
