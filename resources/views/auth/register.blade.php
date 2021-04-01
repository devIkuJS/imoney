<style>
    .bs-stepper .step-trigger,
    .bs-stepper-label{
        display:block !important;
    }

    .custom-file-label::after {
        content: "Adjuntar" !important;
    }

    .custom-file {
        overflow: hidden;
    }

    .custom-file-input {
        white-space: nowrap;
    }
    .card-header{
        background:#0274be !important;
        color:white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 14px;
    }
</style>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PERSONA NATURAL') }}</div>

                <div class="card-body">
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
                                                class="form-control @error('name') is-invalid @enderror" 
                                                name="name" value="{{ old('name') }}" 
                                                required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="apellidos" 
                                            class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                        <div class="col-md-6">
                                            <input id="apellidos" type="text" 
                                                class="form-control @error('apellidos') is-invalid @enderror" 
                                                name="apellidos" value="{{ old('apellidos') }}" 
                                                required autocomplete="apellidos" autofocus>

                                            @error('apellidos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="celular" 
                                            class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                                        <div class="col-md-6">
                                            <input id="celular" type="text" 
                                                class="form-control @error('celular') is-invalid @enderror" 
                                                name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>

                                                @error('celular')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="nacionalidad" 
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>

                                            <div class="col-md-6">
                                                <input id="nacionalidad" type="text" 
                                                    class="form-control @error('nacionalidad') is-invalid @enderror" 
                                                    name="nacionalidad" value="{{ old('nacionalidad') }}" 
                                                    required autocomplete="nacionalidad" autofocus>

                                                @error('nacionalidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="ocupacion" 
                                                class="col-md-4 col-form-label text-md-right">{{ __('Ocupacion') }}</label>

                                            <div class="col-md-6">
                                                <input id="ocupacion" type="text" 
                                                    class="form-control @error('ocupacion') is-invalid @enderror"
                                                    name="ocupacion" value="{{ old('ocupacion') }}" 
                                                    required autocomplete="ocupacion" autofocus>

                                                @error('ocupacion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="politico" 
                                                class="col-md-4 col-form-label text-md-right">{{ __('Es Ud. una persona politicamente expuesta?') }}</label>

                                            <div class="col-md-6 text-left">
                                                <div class="form-check form-check-inline mt-3">
                                                    <label class="form-check-label mr-1" for="si">Si</label>
                                                    <input class="form-check-input mr-4" type="radio" 
                                                        name="politico" id="si" value="si" 
                                                        onclick="showPoliticoContainer();">
                                                    <label class="form-check-label mr-1" for="no">No</label>
                                                    <input class="form-check-input" type="radio" 
                                                        name="politico" id="no" value="no" 
                                                        onclick="showPoliticoContainer();">  
                                                </div>
                                                @error('politico')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div id="politico-container" style="display: none;">

                                            <div class="form-group row">
                                                <label for="cargo"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                                <div class="col-md-6">
                                                    <input id="cargo" type="text" 
                                                        class="form-control @error('cargo') is-invalid @enderror" 
                                                        name="cargo" value="{{ old('cargo') }}" 
                                                        autocomplete="cargo" autofocus>

                                                    @error('cargo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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

                                                    @error('empresa')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                                                    name="dni" value="{{ old('dni') }}" 
                                                    required autocomplete="dni" autofocus>
                                                @error('dni')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="archivo_dni_front" class="col-md-4 col-form-label text-md-right">DNI Anverso</label>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="dni-front" name="archivo_dni_front"
                                                        id="archivo_dni_front" aria-describedby="archivo_dni_front"
                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                    <label class="custom-file-label" for="archivo_dni_front">
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="archivo_dni_atras" class="col-md-4 col-form-label text-md-right">DNI Reverso</label>

                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="dni-atras" name="archivo_dni_atras"
                                                        id="archivo_dni_atras" aria-describedby="archivo_dni_atras"
                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                    <label class="custom-file-label" for="archivo_dni_atras">
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    

                                        
                                    </div>

                                    <div class="text-center">
                                        <a class="btn btn-primary" onclick="stepper1.previous()">Anterior</a>
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
                                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="password" 
                                            class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" 
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" 
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" 
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" 
                                                class="form-control"
                                                name="password_confirmation" 
                                                required autocomplete="new-password">
                                        </div>
                                    </div>

                                    

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-7 mx-auto">
                                        <div class="form-check">
                                            <input type="checkbox" name="terminos" class="form-check-input" id="accept">
                                        <label class="form-check-label" for="accept">Registrándote, aceptas  <a href="#" target="_blank">Términos y Condiciones</a> / <a href="#" target="_blank">Políticas de  privacidad y uso de Datos</a>.</label>
                                        </div>

                                        @error('terminos')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                  
                                    </div>    
                                </div>
                        
                                <div class="form-group row mb-0 mx-auto">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-primary" onclick="stepper1.previous()">Anterior</a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar') }}
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
