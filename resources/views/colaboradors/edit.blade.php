@extends('plantilla.themicon')

@section('dropzone')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('content')

<form action="{{ url('colaboradors/'. $colaborador->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <!-- START card-->
    <div class="card card-default">
       <div class="card-body">
          <div role="tabpanel">
             <!-- Nav tabs-->
             <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">Datos Personales</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Datos Generales</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Datos Médicos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Observaciones / Multimedia / Capacitaciones</a></li>
             </ul><!-- Tab panes-->
             <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-2">
                            <label for="">Tipo de Documento</label>
                            <select name="documento" id="documento" class="form-control @error('documento') is-invalid @enderror">
                                <option value="{{ $colaborador->documento }}">{{ $colaborador->documento }}</option>
                                <option value="DNI">DNI</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                                <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                            </select>

                            @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
            
                        <div class="form-group col-md-2">
                            <label for="">N° de documento</label>
                            <input id="ndocumento" name="ndocumento" class="form-control @error('ndocumento') is-invalid @enderror" type="number" value="{{ $colaborador->ndocumento }}">
                                @error('ndocumento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Nombres</label>
                            <input id="nombres" name="nombres" class="form-control @error('nombres') is-invalid @enderror" type="text" value="{{ $colaborador->nombres }}">
                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Apellidos</label>
                            <input id="apellidos" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" type="text" value="{{ $colaborador->apellidos }}">
                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Fecha de Nacimiento</label>
                            <input id="fechanac" name="fechanac" class="form-control @error('fechanac') is-invalid @enderror" type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="fechanac" id="fechanac" value="{{ $colaborador->fechanac }}">
                                @error('fechanac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="instruccion">Grado de Instrucción</label>
                            <select name="instruccion" id="instruccion" class="form-control @error('instruccion') is-invalid @enderror">
                                <option value="{{ $colaborador->instruccion }}" selected>{{ $colaborador->instruccion }}</option>
                                <option value="ANALFABETO">ANALFABETO</option>
                                <option value="PRIMARIA COMPLETA">PRIMARIA COMPLETA</option>
                                <option value="SECUNDARIA COMPLETA">SECUNDARIA COMPLETA</option>
                                <option value="TECNICO COMPLETO">TECNICO COMPLETO</option>
                                <option value="UNIVERSITARIO COMPLETO">UNIVERSITARIO COMPLETO</option>
                                <option value="PRIMARIA INCOMPLETA">PRIMARIA INCOMPLETA</option>
                                <option value="SECUNDARIA INCOMPLETA">SECUNDARIA INCOMPLETA</option>
                                <option value="TECNICO INCOMPLETO">TECNICO INCOMPLETO</option>
                                <option value="UNIVERSITARIO INCOMPLETO">UNIVERSITARIO INCOMPLETO</option>
                            </select>

                            @error('instruccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Telefono / Celular</label>
                            <input id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" type="number" autocomplete="off" value="{{ $colaborador->telefono }}">
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Dirección</label>
                            <input id="direccion" name="direccion" class="form-control @error('direccion') is-invalid @enderror" type="text" autocomplete="off" value="{{ $colaborador->direccion }}">
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Correo electronico</label>
                            <input id="correo" name="correo" class="form-control @error('correo') is-invalid @enderror" type="email" autocomplete="off" value="{{ $colaborador->correo }}">
                                @error('correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Departamento</label>
                            <select name="departamento_id" id="seleccionar-departamento" class="form-control @error('departamento_id') is-invalid @enderror">
                                <option value="{{$colaborador->departamento->id}}" selected>{{$colaborador->departamento->name}}</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                @endforeach

                            </select>

                            @error('departamento_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Provincia</label>
                            <select name="provincia_id" id="seleccionar-provincia" class="form-control @error('provincia_id') is-invalid @enderror">
                                <option value="{{ $colaborador->provincia->id }}" selected>{{ $colaborador->provincia->name }}</option>
                            </select>

                            @error('provincia_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Distrito</label>
                            <select name="distrito_id" id="seleccionar-distrito" class="form-control @error('distrito_id') is-invalid @enderror">
                                <option value="{{ $colaborador->distrito->id }}" selected>{{ $colaborador->distrito->name }}</option>
                            </select>

                            @error('distrito_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Ubigeo</label>
                            <select name="ubigeo_cod" id="ubigeo" class="form-control @error('ubigeo_cod') is-invalid @enderror">
                                <option value="{{ $colaborador->ubigeo_cod }}"> {{ $colaborador->ubigeo_cod }}</option>
                                @foreach ($ubigeos as $ubigeo)
                                    <option value="{{ $ubigeo->ubigeo_cod }}" {{ old('ubigeo_cod') == $ubigeo->ubigeo_cod ? 'selected' : '' }}>{{ $ubigeo->distrito }}</option>
                                @endforeach
                            </select>

                            @error('ubigeo_cod')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-1">
                            <label for="">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control @error('sexo') is-invalid @enderror">
                                <option value="{{ $colaborador->sexo }}" selected>{{ $colaborador->sexo }}</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>

                            @error('sexo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="estadocivil">Estado Civil</label>
                            <select name="estadocivil" id="estadocivil" class="form-control @error('estadocivil') is-invalid @enderror">
                                <option value="{{ $colaborador->estadocivil }}" selected>{{ $colaborador->estadocivil }}</option>
                                <option value="SOLTERO">SOLTERO</option>
                                <option value="CASADO">CASADO</option>
                                <option value="DIVORCIADO">DIVORCIADO</option>
                                <option value="CONVIVIENTE">CONVIVIENTE</option>
                                <option value="VIUDO">VIUDO</option>
                            </select>

                            @error('estadocivil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="sanguineo">Grupo sanguineo</label>
                            <select name="sanguineo" id="sanguineo" class="form-control @error('sanguineo') is-invalid @enderror">
                                <option value="{{ $colaborador->sanguineo }}" selected>{{ $colaborador->sanguineo }}</option>
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="O-">O-</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                <option value="AB-">AB-</option>
                            </select>

                            @error('sanguineo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">N° de hijos</label>
                            <input id="hijos" name="hijos" class="form-control @error('hijos') is-invalid @enderror" type="number" value="{{ $colaborador->hijos }}">
                                @error('hijos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label for="">Nombre de contacto de emergencia</label>
                            <input id="contacto" name="contacto" class="form-control @error('contacto') is-invalid @enderror" type="text" value="{{ $colaborador->contacto }}">
                                @error('contacto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">telefono de contacto de emergencia</label>
                            <input id="telemeergencia" name="telemeergencia" class="form-control @error('telemeergencia') is-invalid @enderror" type="text" value="{{ $colaborador->telemeergencia }}">
                                @error('telemeergencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="">Tiempo en casa</label>
                            <input id="tiempocasa" name="tiempocasa" class="form-control @error('tiempocasa') is-invalid @enderror" type="text" value="{{ $colaborador->tiempocasa }}">
                                @error('tiempocasa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="banco">Banco</label>
                            <select name="banco" id="banco" class="form-control @error('banco') is-invalid @enderror">
                                <option value="{{ $colaborador->banco }}" selected>{{ $colaborador->banco }}</option>
                                <option value="BCP">BCP</option>
                                <option value="BBVA">BBVA</option>
                                <option value="INTERBANK">INTERBANK</option>
                                <option value="BANBIF">BANBIF</option>
                                <option value="SCOTIABANK">SCOTIABANK</option>
                            </select>

                            @error('banco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <label for="">N° de Cuenta Bancaria</label>
                            <input id="cuentabancaria" name="cuentabancaria" class="form-control @error('cuentabancaria') is-invalid @enderror" type="text" value="{{ $colaborador->cuentabancaria }}">
                                @error('cuentabancaria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-3">
                            <label for="">Categoría</label>
                            <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                                <option value="{{ $colaborador->categoria }}" selected>{{ $colaborador->categoria }}</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>

                            @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Monto</label>
                            <select name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror">
                                <option value="{{ $colaborador->monto }}" selected>{{ $colaborador->monto }}</option>
                                @foreach ($montos as $monto)
                                    <option value="{{ $monto->monto }}">{{ $monto->monto }}</option>
                                @endforeach
                            </select>

                            @error('monto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Área</label>
                            <select name="area" id="area" class="form-control @error('area') is-invalid @enderror">
                                <option value="{{ $colaborador->area }}" selected>{{ $colaborador->area }}</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->nombre }}">{{ $area->nombre }}</option>
                                @endforeach
                            </select>

                            @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Puesto</label>
                            <select name="puesto" id="puesto" class="form-control @error('puesto') is-invalid @enderror">
                                <option value="{{ $colaborador->puesto }}" selected>{{ $colaborador->puesto }}</option>
                                @foreach ($puestos as $puesto)
                                    <option value="{{ $puesto->nombre }}">{{ $puesto->nombre }}</option>
                                @endforeach
                            </select>

                            @error('puesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">¿Cuenta con respirador?</label>
                            <select name="respirador" id="respirador" class="form-control @error('respirador') is-invalid @enderror">
                                <option value="{{ $colaborador->respirador }}" selected>{{ $colaborador->respirador }}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>

                            @error('respirador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">¿Cuenta con zapatos?</label>
                            <select name="zapatos" id="zapatos" class="form-control @error('zapatos') is-invalid @enderror">
                                <option value="{{ $colaborador->zapatos }}" selected>{{ $colaborador->zapatos }}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>

                            @error('zapatos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Talla de zapato</label>
                            <input id="tallazapato" name="tallazapato" class="form-control @error('tallazapato') is-invalid @enderror" type="number" id="tallazapato" value="{{ $colaborador->tallazapato }}">
                                @error('tallazapato')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Talla de pantalon</label>
                            <select name="tallapantalon" id="tallapantalon" class="form-control @error('tallapantalon') is-invalid @enderror">
                                <option value="{{ $colaborador->tallapantalon }}" selected>{{ $colaborador->tallapantalon }}</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>

                            @error('tallapantalon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Talla de camisa</label>
                            <select name="tallacamisa" id="tallacamisa" class="form-control @error('tallacamisa') is-invalid @enderror">
                                <option value="{{ $colaborador->tallacamisa }}" selected>{{ $colaborador->tallacamisa }}</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>

                            @error('tallacamisa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Inicio de Inducción</label>
                            <input id="inicioinduccion" name="inicioinduccion" class="form-control @error('inicioinduccion') is-invalid @enderror" type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="inicioinduccion" id="inicioinduccion" value="{{ $colaborador->inicioinduccion }}">
                                @error('inicioinduccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">Fin de Inducción</label>
                            <input id="fininduccion" name="fininduccion" class="form-control @error('fininduccion') is-invalid @enderror" type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask name="fininduccion" id="fininduccion" value="{{ $colaborador->fininduccion }}">
                                @error('fininduccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Lugar de inducción</label>
                            <input id="lugarinduccion" name="lugarinduccion" class="form-control @error('lugarinduccion') is-invalid @enderror" type="text" id="lugarinduccion" value="{{ $colaborador->lugarinduccion }}">
                                @error('lugarinduccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Especialidad</label>
                            <input id="especialidad" name="especialidad" class="form-control @error('especialidad') is-invalid @enderror" type="text" id="especialidad" value="{{ $colaborador->especialidad }}">
                                @error('especialidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Donde se entero de la entrevista</label>
                            <select name="medio" id="medio" class="form-control @error('medio') is-invalid @enderror">
                                <option value="{{ $colaborador->medio }}" selected>{{ $colaborador->medio }}</option>
                                <option value="FACEBOOK">FACEBOOK</option>
                                <option value="COMPUTRABAJO">COMPUTRABAJO</option>
                                <option value="INDEED">INDEED</option>
                                <option value="AMIGOS">AMIGOS</option>
                                <option value="FAMILIARES">FAMILIARES</option>
                                <option value="LLAMADA">LLAMADA</option>
                                <option value="RECOMENDACION">RECOMENDACIÓN</option>
                                <option value="ING. CARASONA">ING. CARASONA</option>
                            </select>

                            @error('tallacamisa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                    </div>
                </div>

                <div class="tab-pane" id="messages" role="tabpanel">

                    <div class="form-row align-items-center">

                        <div class="form-group col-md-3">
                            <label for="">Talla</label>
                            <input id="talla" name="talla" class="form-control @error('talla') is-invalid @enderror" type="number" value="{{ $colaborador->talla }}" onchange="calcularImc();">
                                @error('talla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Peso</label>
                            <input id="peso" name="peso" class="form-control @error('peso') is-invalid @enderror" type="number" value="{{ $colaborador->peso }}" onchange="calcularImc();">
                                @error('peso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="">IMC</label>
                            <textarea id="imc" name="imc" class="form-control @error('imc') is-invalid @enderror" cols="0" rows="1" readonly>{{ $colaborador->imc }}</textarea>
                                @error('imc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Dx nutricion</label>
                            <textarea id="diagnutricion" name="diagnutricion" class="form-control @error('diagnutricion') is-invalid @enderror" cols="0" rows="1" readonly>{{ $colaborador->diagnutricion }}</textarea>
                                @error('diagnutricion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                                         

                    </div>
                    
                </div>

                <div class="tab-pane" id="settings" role="tabpanel">
                    <div class="form-row align-items-center">

                        <div class="form-group col-md-6">
                            <label for="">Observaciones</label>
                        <textarea class="form-control  @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones" cols="10" rows="4"> {{ $colaborador->observaciones }} </textarea>
                            @error('observaciones')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Comentarios</label>
                            <textarea class="form-control  @error('comentarios') is-invalid @enderror" name="comentarios" id="comentarios" cols="10" rows="4">{{ $colaborador->comentarios }}</textarea>
                            @error('comentarios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        

                        <div class="form-group col-md-4">
                            <label for="">Seleccione Foto del colaborador</label>
                            <div class="dropzone @error('foto') is-invalid @enderror" id="colaborador"></div>                                   
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="hidden" name="foto" id="foto" value="{{ $colaborador->foto }}" width="100%">
                            <p id="error"></p>
                        </div>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div><!-- END card-->
    <div class="row my-2">
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-success btn-sm btn-block">Registrar</button>          
        </div>
        <div class="col-md-2">
            <a href="{{ route('colaboradors.index') }}" class="btn btn-outline-danger btn-sm btn-block">Cancelar</a>  
        </div>
    </div>
</form>

@endsection

@section('dependientes')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js" integrity="sha512-8l10HpXwk93V4i9Sm38Y1F3H4KJlarwdLndY9S5v+hSAODWMx3QcAVECA23NTMKPtDOi53VFfhIuSsBjjfNGnA==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/colaboradores.js') }}"></script>
    <script src="{{ asset('js/imc.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {
            const foto = new Dropzone('#colaborador', {
                url: "/collaborators/imagen",
                dictDefaultMessage: 'Sube la foto aquí',
                acceptedFiles: ".png, .jpg, , .jpeg, .gif, .bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar Archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if(document.querySelector('#foto').value.trim()) {
                        let fotoSubida = {};
                            fotoSubida.size = 1234;
                        fotoSubida.name = document.querySelector('#foto').value;

                        this.options.addedfile.call(this, fotoSubida);
                        this.options.thumbnail.call(this, fotoSubida, `/storage/colaboradores/${fotoSubida.name}`);

                        fotoSubida.previewElement.classList.add('dz-success');
                        fotoSubida.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file, response) {
                    console.log(response.correcto);
                    document.querySelector('#error').textContent = '';

                    document.querySelector('#foto').value = response.correcto;
                    
                    file.nombreServidor = response.correcto;
                },
                maxfilesexceeded: function(file) {
                    if(this.files[1] != null) {
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#foto').value
                    }

                    axios.post('/collaborators/borrarimagen', params)
                    .then(respuesta => console.log(respuesta))
                }
            });
        });
    </script>

@endsection     