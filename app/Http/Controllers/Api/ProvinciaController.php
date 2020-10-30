<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{
    public function getProvinciaxDep($id)
    {
        return Provincia::where('departamento_id', $id)->get(['id', 'name','departamento_id']);
    }
}
