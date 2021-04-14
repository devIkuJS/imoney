<style>

.container{
        margin-top: -11px !important;
       
    }
    .bs-stepper .step-trigger,
    .bs-stepper-label {
        display: block !important;   
        font-size:12px;
    }
    .bs-stepper-label{
        white-space: pre-wrap !important;
        margin: 0px !important;

    }
    .bs-stepper-header{
        margin-bottom:20px;
    }
    .active .bs-stepper-circle {
        background-color: #0274be !important;
    }

    .custom-file-label::after {
        content: "Adjuntar" !important;
    }

    .custom-file {
        overflow: hidden;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }

    .custom-file-input {
        white-space: nowrap;
    }

    .card-header {
        background: #0274be !important;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
    }

    .img-fluid{
        
        margin-right:10px;
    }
    .form-control{
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);  
    }

    .col-form-label{
        color:gray ;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
    }
   
    .btn-primary1{
        background-color: #C0BEBF !important;
        color:white  !important;
        font-weight:bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }
    .btn-primary{
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background:#0274be !important;
    }
    .form-check-label2{
        color: black !important; 
        font-weight: bold !important;   
    }
    .link-password {
    font-family: Helvetica, sans-serif;
    color: black;
    font-weight: bold ;
    }
    
        
</style>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><img src={{asset('imagenes/persona100.png')}} alt="Fjords" style="width:7%" class="img-fluid">  {{ __('PERSONA NATURAL') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div id="stepper1" class="bs-stepper linear">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step active" data-target="#test-l-1">
                                    <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                                        aria-controls="test-l-1" aria-selected="true">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Datos Principales</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-2">
                                    <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                                        aria-controls="test-l-2" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Adjuntar Documentos</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-3">
                                    <button type="button" class="step-trigger" role="tab" id="stepper1trigger3"
                                        aria-controls="test-l-3" aria-selected="false" disabled="disabled">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Crea tu usuario y contraseña</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">

                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div id="test-l-1" role="tabpanel" class="bs-stepper-pane active dstepper-block"
                                        aria-labelledby="stepper1trigger1">

                                        <div class="form-group row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="apellidos"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                            <div class="col-md-6">
                                                <input id="apellidos" type="text"
                                                    class="form-control @error('apellidos') is-invalid @enderror"
                                                    name="apellidos" value="{{ old('apellidos') }}" required
                                                    autocomplete="apellidos" autofocus>

                                                    @if ($errors->has('apellidos'))
                                                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="celular"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                                            <div class="col-md-6">
                                                <input id="celular" type="text"
                                                    class="form-control @error('celular') is-invalid @enderror"
                                                    name="celular" value="{{ old('celular') }}" required
                                                    autocomplete="celular" autofocus>

                                                    @if ($errors->has('celular'))
                                                    <span class="text-danger">{{ $errors->first('celular') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="domicilio"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Domicilio') }}</label>

                                            <div class="col-md-6">
                                                <input id="domicilio" type="text"
                                                    class="form-control @error('domicilio') is-invalid @enderror"
                                                    name="domicilio" value="{{ old('domicilio') }}" required
                                                    autocomplete="domicilio" autofocus>

                                                    @if ($errors->has('domicilio'))
                                                    <span class="text-danger">{{ $errors->first('domicilio') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nacionalidad"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>

                                            <div class="col-md-6">
                                                <input id="nacionalidad" type="text"
                                                    class="form-control @error('nacionalidad') is-invalid @enderror"
                                                    name="nacionalidad" value="{{ old('nacionalidad') }}" required
                                                    autocomplete="nacionalidad" autofocus>

                                                    @if ($errors->has('nacionalidad'))
                                                    <span class="text-danger">{{ $errors->first('nacionalidad') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ocupacion"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Ocupacion') }}</label>

                                            <div class="col-md-6">
                                                <input id="ocupacion" type="text"
                                                    class="form-control @error('ocupacion') is-invalid @enderror"
                                                    name="ocupacion" value="{{ old('ocupacion') }}" required
                                                    autocomplete="ocupacion" autofocus>

                                                    @if ($errors->has('ocupacion'))
                                                    <span class="text-danger">{{ $errors->first('ocupacion') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="politico"
                                                class="col-md-4 col-form-label text-md-right">{{ __('¿Es Ud. una persona politicamente expuesta?') }}</label>

                                            <div class="col-md-6 text-left">
                                                <div class="form-check form-check-inline mt-3">
                                                    <label class="form-check-label mr-1" for="si">Si</label>
                                                    <input class="form-check-input mr-4" type="radio" name="politico"
                                                        id="si" value="si" onclick="showPoliticoContainer();">
                                                    <label class="form-check-label mr-1" for="no">No</label>
                                                    <input class="form-check-input" type="radio" name="politico" id="no"
                                                        value="no" onclick="showPoliticoContainer();">
                                                </div>
                                                @if ($errors->has('politico'))
                                                <span class="text-danger d-block">{{ $errors->first('politico') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div id="politico-container" style="display: none;">

                                            <div class="form-group row">
                                                <label for="cargo"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                                <div class="col-md-6">
                                                    <input id="cargo" type="text"
                                                        class="form-control @error('cargo') is-invalid @enderror"
                                                        name="cargo" value="{{ old('cargo') }}" autocomplete="cargo"
                                                        autofocus>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="empresa"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                                                <div class="col-md-6">
                                                    <input id="empresa" type="text"
                                                        class="form-control @error('empresa') is-invalid @enderror"
                                                        name="empresa" value="{{ old('empresa') }}"
                                                        autocomplete="empresa" autofocus>

                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a class="btn btn-primary" onclick="stepper1.next()">Siguiente</a>
                                        </div>

                                    </div>

                                    <div id="test-l-2" role="tabpanel" class="bs-stepper-pane"
                                        aria-labelledby="stepper1trigger2">
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label for="dni"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Número de documento') }}</label>

                                                <div class="col-md-6">
                                                    <input id="dni" type="text"
                                                        class="form-control @error('dni') is-invalid @enderror"
                                                        name="dni" value="{{ old('dni') }}" required autocomplete="dni"
                                                        autofocus>
                                                        @if ($errors->has('dni'))
                                                        <span class="text-danger">{{ $errors->first('dni') }}</span>
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="archivo_dni_front"
                                                    class="col-md-4 col-form-label text-md-right">DNI Anverso</label>

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="dni-front"
                                                                name="archivo_dni_front" id="archivo_dni_front"
                                                                aria-describedby="archivo_dni_front"
                                                                accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                            <label class="custom-file-label" for="archivo_dni_front">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('archivo_dni_front'))
                                                <span class="text-danger d-block">{{ $errors->first('archivo_dni_front') }}</span>
                                                @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="archivo_dni_atras"
                                                    class="col-md-4 col-form-label text-md-right">DNI Reverso</label>

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="dni-atras"
                                                                name="archivo_dni_atras" id="archivo_dni_atras"
                                                                aria-describedby="archivo_dni_atras"
                                                                accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                            <label class="custom-file-label" for="archivo_dni_atras">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('archivo_dni_atras'))
                                                <span class="text-danger d-block">{{ $errors->first('archivo_dni_atras') }}</span>
                                                @endif
                                                </div>
                                            </div>


                                        </div>

                                        <div class="text-center">
                                            <a class="btn btn-primary1" onclick="stepper1.previous()">Anterior</a>
                                            <a class="btn btn-primary" onclick="stepper1.next()">Siguiente</a>
                                        </div>

                                    </div>

                                    <div id="test-l-3" role="tabpanel" class="bs-stepper-pane"
                                        aria-labelledby="stepper1trigger3">

                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email">

                                                    @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                            </div>
                                        </div>

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
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-7 mx-auto">
                                                <div class="form-check">
                                                    <input type="checkbox" name="terminos" class="form-check-input"
                                                        id="accept">
                                                    <label class="form-check-label2" for="accept">Registrándote, aceptas.
                                                        <a href="#" target="_blank" class="text-dark link-password">Términos y Condiciones</a>. <a
                                                            href="#" target="_blank" class="text-dark link-password">Políticas de privacidad y uso de
                                                            Datos</a>.</label>
                                                </div>

                                                @if ($errors->has('terminos'))
                                                    <span class="text-danger d-block">{{ $errors->first('terminos') }}</span>
                                                    @endif

                                            </div>
                                        </div>



                                        <div class="form-group row mb-0 mx-auto">
                                            <div class="col-md-6 offset-md-4">
                                                <a class="btn btn-primary1" onclick="stepper1.previous()">Anterior</a>
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Registrar') }}
                                                </button>
                                            </div>
                                        </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection


    @section('custom-script')
    <script type="text/javascript">
        var stepper1
document.addEventListener('DOMContentLoaded', function () {
  stepper1 = new Stepper(document.querySelector('#stepper1'))

})

function showPoliticoContainer() {
    if (document.getElementById('si').checked) {
        document.getElementById('politico-container').style.display = 'block';
    }
    else document.getElementById('politico-container').style.display = 'none';

}

document.querySelector('.dni-front').addEventListener('change',function(e){ 
  var fileName = document.getElementById("archivo_dni_front").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

document.querySelector('.dni-atras').addEventListener('change',function(e){
  var fileName = document.getElementById("archivo_dni_atras").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
 
    </script>

    @stop