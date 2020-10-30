<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distrito;

class DistritoController extends Controller
{
    public function getDistritoxProv($id)
    {
        return Distrito::where('provincia_id', $id)->get(['id', 'name','provincia_id']);
    }
}
