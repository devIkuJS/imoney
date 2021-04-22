<style>

    main{
            margin-top: 25px !important;     
    }
    
    .col-md-8{
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05) !important;
        border-radius:37px;
    }

    .card-header {
        background: #0274be !important;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
    }
    
    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%); 
        
    }
    
    .col-form-label{
        color:#22abf1 ;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        
    }
    input:disabled{
        background:white !important;
       
    }
    input:focus, input.form-control:focus {
        outline:none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }

    .btn-primary1 {
        background-color: #C0BEBF !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }

    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background: #0274be !important;
    }
    h5{
       /* color:#2375f0; */
       font-family: Helvetica, sans-serif !important;
    }
    h3{
        color:#2375F0;
    }

         
</style>
@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="card">
            <div class="card-header"><h5 class="text-center font-weight-bold">{{ __('MI PERFIL') }}</div></h5>
                <div class="card-body">                
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <!--<form method="POST" action="{{ route('misDatos') }}">
                                @csrf -->
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="text-left mt-5">
                                                        <p class="font-weight-bold">
                                                        En Imoney nos preocupamos por la seguridad de tu información 
                                                        y la protegemos a través de un protocolo de seguridad que 
                                                        garantiza la privacidad de tus datos.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="name"
                                                        class="col-form-label">{{ __('NOMBRES') }}</label>
                                                        
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{$user->name}}" required autocomplete="name" autofocus disabled>

                                                    @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="apellidos" 
                                                        class="col-form-label">{{ __('APELLIDOS') }}</label>
                                                                                            
                                                    <input id="apellidos" type="text"
                                                        class="form-control @error('apellidos') is-invalid @enderror"
                                                        name="apellidos" value="{{$user->apellidos}}" required
                                                        autocomplete="apellidos" autofocus disabled>

                                                    @if ($errors->has('apellidos'))
                                                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                                    @endif
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="dni"
                                                        class="col-form-label">{{ __('N° DE DOCUMENTO') }}</label>
        
                                                    <input id="dni" type="text"
                                                        class="form-control @error('dni') is-invalid @enderror"
                                                        name="dni" value="{{$user->dni}}" required autocomplete="dni"
                                                        autofocus disabled>
                                                            @if ($errors->has('dni'))
                                                            <span class="text-danger">{{ $errors->first('dni') }}</span>
                                                            @endif                                            
                                                </div>
                                            
                                               

                                                <div class="col-md-6">
                                                    <label for="domicilio"
                                                        class="col-form-label">{{ __('DOMICILIO') }}</label>

                                                    <input id="domicilio" type="text"
                                                        class="form-control @error('domicilio') is-invalid @enderror"
                                                        name="domicilio" value="{{$user->domicilio}}" required
                                                        autocomplete="domicilio" autofocus disabled>

                                                    @if ($errors->has('domicilio'))
                                                    <span class="text-danger">{{ $errors->first('domicilio') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="email"
                                                        class="col-form-label">{{ __('CORREO') }}</label>

                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{$user->email}}" required
                                                        autocomplete="email">

                                                    @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                        
                                                <div class="col-md-6">
                                                    <label for="celular"
                                                        class="col-form-label">{{ __('CELULAR') }}</label>

                                                        <input id="celular" type="text"
                                                            class="form-control @error('celular') is-invalid @enderror"
                                                            name="celular" value="{{$user->celular}}" required
                                                            autocomplete="celular" autofocus>

                                                        @if ($errors->has('celular'))
                                                        <span class="text-danger">{{ $errors->first('celular') }}</span>
                                                        @endif
                                                        <!--<a id="btnModalActualizarCelular"><img src={{asset('imagenes/edit-perfil.png')}} class="card-img-top"
                                                           alt="Imagen Financiamiento"></a> -->
                                                            <button type="button" class="btn btn-warning btn-sm btn-xs" data-toggle="modal" data-target="#exampleModalCenter">
                                                            <i class="fas fa-edit"></i>
                                                            </button>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="ocupacion"
                                                        class="col-form-label">{{ __('OCUPACIÓN') }}</label>

                                                    <input id="ocupacion" type="text"
                                                        class="form-control @error('ocupacion') is-invalid @enderror"
                                                        name="ocupacion" value="{{$user->ocupacion}}" required
                                                        autocomplete="ocupacion" autofocus disabled>

                                                    @if ($errors->has('ocupacion'))
                                                    <span class="text-danger">{{ $errors->first('ocupacion') }}</span>
                                                    @endif
                                                </div>
                                
                                                <div class="col-md-6">
                                                    <label for="nacionalidad"
                                                        class="col-form-label">{{ __('NACIONALIDAD') }}</label>

                                                    <input id="nacionalidad" type="text"
                                                        class="form-control @error('nacionalidad') is-invalid @enderror"
                                                        name="nacionalidad" value="{{$user->nacionalidad}}" required
                                                        autocomplete="nacionalidad" autofocus disabled>

                                                    @if ($errors->has('nacionalidad'))
                                                    <span class="text-danger">{{ $errors->first('nacionalidad') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="politico"
                                                            class="col-form-label">{{ __('¿ES UD. UNA PERSONA POLITICAMENTE EXPUESTA?') }}</label>
    
                                                        <div class="form-check form-check-inline mt-3">
                                                            <label class="form-check-label mr-1" for="si">Si</label>
                                                            <input class="form-check-input mr-4" type="radio" name="politico"
                                                                id="si" value="si" checked onclick="showPoliticoContainer();" disabled>
                                                            <label class="form-check-label mr-1" for="no">No</label>
                                                            <input class="form-check-input" type="radio" name="politico" id="no"
                                                                value="no" onclick="showPoliticoContainer();" disabled>
                                                        </div>
                                                        @if ($errors->has('politico'))
                                                        <span
                                                            class="text-danger d-block">{{ $errors->first('politico') }}</span>
                                                        @endif
                                                </div>
                                            

                                                <!--<div id="politico-container" style="display: none;">

                                                    <div class="form-group row">
                                                        <label for="cargo"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="cargo" type="text"
                                                                class="form-control @error('cargo') is-invalid @enderror"
                                                                name="cargo" value="{{$user->cargo}}" autocomplete="cargo"
                                                                autofocus disabled>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="empresa"
                                                            class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="empresa" type="text"
                                                                class="form-control @error('empresa') is-invalid @enderror"
                                                                name="empresa" value="{{$user->empresa}}"
                                                                autocomplete="empresa" autofocus disabled>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary px-4 float-right">
                                                            {{ __('Guardar') }}
                                                        </button>
                                                    </div>
                                            </div>

                                            <!--<div class="text-center">
                                                <button type="submit" class="btn btn-primary px-4 float-right">
                                                        {{ __('Guardar') }}
                                                </button>
                                            </div> -->
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" 
                                                            data-target="#modal-cambiar-contrasena">
                                                            <i class="fa fa-key"></i>&nbsp;Cambiar Contraseña
                                                    </button>
                                                </div>
                                            </div>
                            </form>
                        </div>               
                    </div>    
                </div>
            </div>
        </div>
    </div>
    
</main>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>






<!-- Modal Cambiar Contraseña -->

<div class="modal fade" id="modal-cambiar-contrasena" tabindex="-1" role="dialog" aria-labelledby="modal-cambiar-contrasena" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-cambiar-contrasena">CAMBIAR CONTRASEÑA</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('misDatos') }}">
            @csrf
            <div class="form-group row">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" autocomplete="new-password">

                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                    </div>
            </div>
            <div class="form-group row">
                    <label for="NuevoPassword"
                           class="col-md-4 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="NuevoPassword" type="password"
                               class="form-control @error('NuevoPassword') is-invalid @enderror"
                               name="NuevoPassword" autocomplete="new-NuevoPassword">

                                @if ($errors->has('NuevoPassword'))
                                <span class="text-danger">{{ $errors->first('NuevoPassword') }}</span>
                                @endif
                    </div>
            </div>


            <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                    <div class="col-md-6">
                         <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                    </div>
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="cambiar-contrasena">RESTABLECER</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Cambiar Contraseña -->

    @endsection


    @section('custom-script')
    <script type="text/javascript">
      

function showPoliticoContainer() {
    if (document.getElementById('si').checked) {
        document.getElementById('politico-container').style.display = 'block';
    }
    else document.getElementById('politico-container').style.display = 'none';

}

 
    </script>
@stop