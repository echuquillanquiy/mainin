<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Colaborador;
use App\Departamento;
use App\Ubigeo;
use App\Categoria;
use App\Monto;
use App\Area;
use App\Puesto;
use App\Cliente;
use App\Medico;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::orderBy('id', 'Desc')->paginate(50);
        return view('colaboradors.index', compact('colaboradores'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $ubigeos = Ubigeo::all();
        $categorias = Categoria::all();
        $montos = Monto::all();
        $areas = Area::all();
        $puestos = Puesto::all();
        $clientes = Cliente::all();
        return view('colaboradors.create', compact('departamentos', 'ubigeos', 'categorias', 'montos', 'areas', 'puestos', 'clientes'));
    }

    public function store(Request $request)
    {
        $entrevistador = auth()->user()->id;

        $data = $request->validate([
            'documento' => 'required',
            'ndocumento' => 'required|unique:colaboradors',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fechanac' => 'required',
            'instruccion' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'departamento_id' => 'required',
            'provincia_id' => 'required',
            'distrito_id' => 'required',
            'ubigeo_cod' => 'required',
            'sexo' => 'required',
            'estadocivil' => 'required',
            'sanguineo' => 'required',
            'hijos' => 'required',
            'contacto' => 'required',
            'telemeergencia' => 'required',
            'tiempocasa' => 'required',
            'banco' => 'required',
            'cuentabancaria' => 'required',
            'categoria' => 'required',
            'monto' => 'required',
            'area' => 'required',
            'puesto' => 'required',
            'cliente' => 'required',
            'fechaexmedico' => 'required',
            'levantamientoobs' => 'nullable',
            'respirador' => 'required',
            'zapatos' => 'required',
            'tallazapato' => 'required',
            'tallapantalon' => 'required',
            'tallacamisa' => 'required',
            'talla' => 'required',
            'peso' => 'required',
            'imc' => 'nullable',
            'diagnutricion' => 'nullable',
            'centromedico' => 'nullable',
            'aptitud' => 'nullable',
            'especialidad' => 'nullable',
            'inicioinduccion' => 'nullable',
            'fininduccion' => 'nullable',
            'lugarinduccion' => 'nullable',
            'medio' => 'required',
            'observaciones' => 'required',
            'comentarios' => 'required',
            'foto' => 'nullable',
            'cliente' => 'required', 
            'fechaexmedico' => 'required', 
            'levantamientoobs' => 'required',
            'centromedico' => 'required',
            'aptitud' => 'required',
        ]);
        
        $colaborador = Colaborador::create([
            'user_id' => $entrevistador,
            'documento' => $data['documento'],
            'ndocumento' => $data['ndocumento'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'fechanac' => $data['fechanac'],
            'instruccion' => $data['instruccion'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
            'correo' => $data['correo'],
            'departamento_id' => $data['departamento_id'],
            'provincia_id' => $data['provincia_id'],
            'distrito_id' => $data['distrito_id'],
            'ubigeo_cod' => $data['ubigeo_cod'],
            'sexo' => $data['sexo'],
            'estadocivil' => $data['estadocivil'],
            'sanguineo' => $data['sanguineo'],
            'hijos' => $data['hijos'],
            'contacto' => $data['contacto'],
            'telemeergencia' => $data['telemeergencia'],
            'tiempocasa' => $data['tiempocasa'],
            'banco' => $data['banco'],
            'cuentabancaria' => $data['cuentabancaria'],
            'categoria' => $data['categoria'],
            'monto' => $data['monto'],
            'area' => $data['area'],
            'puesto' => $data['puesto'],
            'cliente' => $data['cliente'],
            'fechaexmedico' => $data['fechaexmedico'],
            'levantamientoobs' => $data['levantamientoobs'],
            'respirador' => $data['respirador'],
            'zapatos' => $data['zapatos'],
            'tallazapato' => $data['tallazapato'],
            'tallapantalon' => $data['tallapantalon'],
            'tallacamisa' => $data['tallacamisa'],
            'talla' => $data['talla'],
            'peso' => $data['peso'],
            'imc' => $data['imc'],
            'diagnutricion' => $data['diagnutricion'],
            'centromedico' => $data['centromedico'],
            'aptitud' => $data['aptitud'],
            'especialidad' => $data['especialidad'],
            'inicioinduccion' => $data['inicioinduccion'],
            'fininduccion' => $data['fininduccion'],
            'lugarinduccion' => $data['lugarinduccion'],
            'medio' => $data['medio'],
            'observaciones' => $data['observaciones'],
            'comentarios' => $data['comentarios'],
            'foto' => $data['foto']            
        ]);

        $capacitaciones_data = [
            'colaborador_id' => $colaborador->id,
            'fechabambas' => $request->fechabambas,
            'bambas' => $request->bambas ,
            'fechabrocal' => $request->fechabrocal ,
            'brocal' => $request->brocal ,
            'fechaantapaccay' => $request->fechaantapaccay ,
            'antapaccay' => $request->antapaccay ,
        ];        

        $medicos_data = [
            'colaborador_id' => $colaborador->id,
            'cliente' => $request->cliente,
            'fechaexmedico'  => $request->fechaexmedico,
            'levantamientoobs' => $request->levantamientoobs,
            'centromedico' => $request->centromedico,
            'aptitud' => $request->aptitud,
        ];

        $capacitacion = $colaborador->capacitacion()->create($capacitaciones_data);
        $medicos = $colaborador->medico()->create($medicos_data);

        $notificacion = 'Se ha creado correctamente el registro del colaborador';
        return redirect('colaboradors');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();
        return 'Colaborador Eliminado!';
    }

    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/colaboradores'), $nombreImagen );

        return response()->json(['correcto' => $nombreImagen]);
    }

    public function borrarimagen(Request $request)
    {
        if($request->ajax()) {
            $imagen = $request->get('imagen');

            if( File::exists('storage/colaboradores/' . $imagen)){
                File::delete('storage/colaboradores/' . $imagen);
            }

            return response('Foto Eliminada', 200);
        }
    }
}
