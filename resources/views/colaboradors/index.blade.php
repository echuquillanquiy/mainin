@extends('plantilla.themicon')

@section('content')

<div class="card card-default">
    @if (session('notificacion'))
        <span class="alert alert-success" role="alert">
            {{ $notificacion }}
        </span>
    @endif
    <div class="card-header text-right">
        <a href="{{ route('colaboradors.create') }}" class="btn btn-success btn-lg mr-1">Crear</a>
        <a href="{{ route('showimport') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-upload"></i> Cargar</a>
        <a href="{{ route('exportar.colaborador') }}" class="btn btn-outline-danger btn-lg"><i class="fas fa-download"></i> Exportar</a>
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-hover">
             <thead>
                <tr>
                   <th>Entrevistador</th>
                   <th>Nombres</th>
                   <th>Apellidos</th>
                   <th>Dni</th>
                   <th>Departamento</th>
                   <th>Ubigeo</th>
                   <th>foto</th>
                   <th>Opciones</th>
                </tr>
             </thead>
             <tbody>
                 @foreach ($colaboradores as $colaborador)
                     <tr>
                        <td> {{ $colaborador->user->username }} </td>
                        <td> {{ $colaborador->nombres }} </td>
                        <td> {{ $colaborador->apellidos }} </td>
                        <td> {{ $colaborador->ndocumento }} </td>
                        <td> {{ $colaborador->departamento->name }} </td>
                        <td> {{ $colaborador->ubigeo_cod }} </td>
                        <td>
                            <div class="media">
                                @if($colaborador->foto == null)
                                    <a href="#">
                                        <img class="img-circle img-sm" width="40" height="40" src="{{ asset('colaborador/fotoprueba.png') }}" alt="Foto Colaborador">
                                    </a>
                                @else
                                <a href="">
                                    <img class="rounded-square" width="40" height="40" src="/storage/colaborador/{{ $colaborador->foto }}" alt="{{ $colaborador->nombres }}">
                                </a>
                                @endif
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info mr-1"><em class="fa fa-edit fa-fw text-white"></em></button>
                            <button type="button" class="btn btn-sm btn-danger mr-1"><em class="fa fa-trash fa-fw"></em></button>
                            <button type="button" class="btn btn-sm btn-success mr-1"><em class="fa fa-eye fa-fw text-white"></em></button>
                            <button type="button" class="btn btn-sm btn-primary mr-1"><em class="fas fa-hospital fa-fw"></em></button>
                            <button type="button" class="btn btn-sm btn-dark mr-1"><em class="far fa-address-book text-white"></em></button>
                        </td>
                    </tr>
                 @endforeach
                
             </tbody>
          </table>
       </div>
    </div>
    <div class="card-footer pagination justify-content-center">
        {{ $colaboradores->links() }}
    </div>
 </div>
@endsection
