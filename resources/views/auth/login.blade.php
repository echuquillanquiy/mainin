@extends('plantilla.form')

@section('content')
<div class="wrapper mt-5">
    <div class="block-center wd-xl">
       <!-- START card-->
       <div class="card card-flat">
          <div class="card-header text-center bg-light"><a href="#"><img class="block-center rounded" src="{{ asset('img/logo.png') }}" alt="Image"></a></div>
          <div class="card-body">
             <p class="text-center py-2">INGRESE SUS CREDENCIALES DE ACCESO</p>
             <form class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                   <div class="input-group with-focus">
                        <input id="login" name="login" class="form-control border-right-0 @error('username') is-invalid @enderror @error('login') is-invalid @enderror" id="exampleInputEmail1" type="text" autocomplete="off">
                        <div class="input-group-append">
                          <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-envelope"></em>
                          </span>
                        </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <div class="form-group">
                    <div class="input-group with-focus">
                       <input class="form-control border-right-0 @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password">
                        <div class="input-group-append">
                          <span class="input-group-text text-muted bg-transparent border-left-0">
                              <em class="fa fa-lock"></em>
                            </span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>
                </div>
                <div class="clearfix">
                   <div class="float-right"><a class="text-muted" href="{{ route('password.request') }}">¿Olvidaste tu Contraseña?</a></div>
                </div><button class="btn btn-block btn-success mt-3" type="submit">Ingresar</button>
             </form>
          </div>
       </div><!-- END card-->
       <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2020</span><span class="mr-2">-</span><span>Mainin</span></div>
    </div>
 </div><!-- =============== VENDOR SCRIPTS ===============-->
@endsection
