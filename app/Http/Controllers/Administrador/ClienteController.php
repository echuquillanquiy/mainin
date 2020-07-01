<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;
use App\Contacto;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function clients()
    {
        return Cliente::orderBy('id', 'Desc')->get();   
    }
    
    public function index()
    {
        return view('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;

        $cliente->ruc = $request->ruc;
        $cliente->rsocial = $request->rsocial;
        $cliente->direccion = $request->direccion;
        $cliente->save();

        return 'Cliente guardado correctamente';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->ruc = $request->ruc;
        $cliente->rsocial = $request->rsocial;
        $cliente->direccion = $request->direccion;
        $cliente->save();

        return 'Cliente actualizado correctamente';
    }

    public function contacto(Request $request,Cliente $cliente)
    {
       $contacto = new Contacto;

       $contacto->contacto = $request->contacto;
       $contacto->telefono = $request->telefono;
       $contacto->email = $request->email;
       $contacto->cliente_id = $request->cliente_id;

       $contacto->save();

       return 'Contacto guardado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return 'Se elimino correctamente';
    }
}
