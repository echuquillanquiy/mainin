<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/departamentos', 'Api\DepartamentoController@getDepartamentos');
Route::get('/departamentos/{id}/provincias', 'Api\ProvinciaController@getProvinciaxDep');
Route::get('/provincias/{id}/distritos', 'Api\DistritoController@getDistritoxProv');