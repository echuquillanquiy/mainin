<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'administrador'])->namespace('Administrador')->group(function () {

    Route::resource('colaboradors', 'ColaboradorController');

    Route::resource('puestos', 'PuestoController');
    Route::get('/positions', 'PuestoController@positions');

    Route::resource('clientes', 'ClienteController');
    Route::get('/clients', 'ClienteController@clients');
    Route::post('/clientes/{puesto}', 'ClienteController@contacto');

    Route::resource('categorias', 'CategoriaController');
    Route::get('/categories', 'CategoriaController@categories');

    Route::resource('areas', 'AreaController');
    Route::get('/areasall', 'AreaController@areasall');

    Route::resource('montos', 'MontoController');
    Route::get('/amounts', 'MontoController@amounts');

    Route::resource('collaborators', 'ColaboradorController');
    Route::post('/collaborators/imagen', 'ColaboradorController@imagen')->name('colaborador.imagen');
    Route::post('/collaborators/borrarimagen', 'ColaboradorController@borrarimagen')->name('colaborador.borrar');

    //IMPORT

    Route::get('/export', 'ColaboradorsExportController@export')->name('exportar.colaborador');
    Route::get('/import', 'ColaboradorImportController@show')->name('showimport');
    Route::post('/import', 'ColaboradorImportController@store')->name('import.store');
        
});
