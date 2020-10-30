@extends('plantilla.themicon')
@section('content')

<div class="card card-default">
    @if (session('notificacion'))
        <span class="alert alert-success" role="alert">
            {{ $notificacion }}
        </span>
    @endif
    <div class="card-header text-center">
        <h2>IMPORTAR COLABORADORES</h2>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

            @if (isset($errors) && $errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
            @endif

       <form action="{{ route('showimport') }}" method="POST" enctype="multipart/form-data" id="dropzone-area">
            @csrf
            <div class="form-group border py-3">
                <input type="file" name="file" />
                <button type="submit" class="btn btn-primary">Importar</button>
                <a href="{{ route('colaboradors.index') }}" class="btn btn-danger btn-md mr-1">Volver</a>
            </div>
       </form>

       @if (session()->has('failures'))
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-danger">
                        <tr>
                            <th>Fila</th>
                            <th>Nombre de Fila a Importar</th>
                            <th>Errores</th>
                            <th>Valor</th>
                        </tr>
    
                        @foreach (session()->get('failures') as $validation)
                            <tr>
                                <td> {{ $validation->row() }} </td>
                                <td> {{ $validation->attribute() }} </td>
                                <td class="text-left">
                                    <ul>
                                        @foreach ($validation->errors() as $e)
                                            <li> {{ $e }} </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td> {{ $validation->values()[$validation->attribute()] }} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
    </div>

 </div>
@endsection