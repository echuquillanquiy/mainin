<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    public function getDepartamentos()
    {
        return Departamento::orderBy('id', 'Asc')->get();
    }
}
