<style>
    .bs-stepper .step-trigger,
    .bs-stepper-label {
        display: block !important;
        font-size:12px;
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
    .card-header{
        background:#0274be !important;
        color:white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 14px;
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
    font-weight: bold !important;
    }
</style>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><img src={{asset('imagenes/mesa.png')}} alt="Fjords" style="width:5%" class="img-fluid"> {{ __('EMPRESA') }}</div>

                <div class="card-body">
                    <div id="stepper1" class="bs-stepper linear">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step active" data-target="#test-l-1">
                                <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                                    aria-controls="test-l-1" aria-selected="true">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Datos de la Empresa</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-2">
                                <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                                    aria-controls="test-l-2" aria-selected="false" disabled="disabled">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Datos del Representante legal</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-3">
                                <button type="button" class="step-trigger" role="tab" id="stepper1trigger3"
                                    aria-controls="test-l-3" aria-selected="false" disabled="disabled">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Datos del Responsable de Operaciones</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-4">
                                <button type="button" class="step-trigger" role="tab" id="stepper1trigger4"
                                    aria-controls="test-l-4" aria-selected="false" disabled="disabled">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Adjuntar Documentos</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form method="POST" action="{{ route('empresa.create') }}" enctype="multipart/form-data">
                                @csrf
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane active dstepper-block"
                                    aria-labelledby="stepper1trigger1">

                                    <div class="form-group row">
                                        <label for="razon_social"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Razón Social') }}</label>

                                        <div class="col-md-6">
                                            <input id="razon_social" type="text"
                                                class="form-control @error('razon_social') is-invalid @enderror"
                                                name="razon_social" value="{{ old('razon_social') }}"
                                                autocomplete="razon_social">

                                            @if ($errors->has('razon_social'))
                                            <span class="text-danger">{{ $errors->first('razon_social') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="numero_ruc"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Número de RUC') }}</label>

                                        <div class="col-md-6">
                                            <input id="numero_ruc" type="text" class="form-control @error('numero_ruc') is-invalid @enderror" name="numero_ruc"
                                                value="{{ old('numero_ruc') }}" autocomplete="numero_ruc" maxlength="11">

                                                @if ($errors->has('numero_ruc'))
                                                <span class="text-danger">{{ $errors->first('numero_ruc') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="actividad_economica"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Actividad Económica') }}</label>

                                        <div class="col-md-6">
                                            <input id="actividad_economica" type="text" class="form-control @error('actividad_economica') is-invalid @enderror"
                                                name="actividad_economica" value="{{ old('actividad_economica') }}"
                                                autocomplete="actividad_economica">

                                                @if ($errors->has('actividad_economica'))
                                                <span class="text-danger">{{ $errors->first('actividad_economica') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="grupo"
                                            class="col-md-4 col-form-label text-md-right">{{ __('¿Ud. pertenece a un grupo económico?') }}</label>

                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline mt-3">
                                                <label class="form-check-label mr-1" for="si">Si</label>
                                                <input class="form-check-input mr-4" type="radio" name="grupo"
                                                    id="si_grupo" value="si" onclick="showGrupoContainer();">
                                                <label class="form-check-label mr-1" for="no">No</label>
                                                <input class="form-check-input" type="radio" name="grupo" id="no_grupo"
                                                    value="no" onclick="showGrupoContainer();">
                                            </div>
                                            @if ($errors->has('grupo'))
                                                <span class="text-danger d-block">{{ $errors->first('grupo') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div id="grupo-container" style="display: none;">

                                        <div class="form-group row">
                                            <label for="grupo_economico"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Grupo Económico') }}</label>

                                            <div class="col-md-6">
                                                <input id="grupo_economico" type="text" class="form-control"
                                                    name="grupo_economico" value="{{ old('grupo_economico') }}"
                                                    autocomplete="grupo_economico">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telefono_fijo"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Teléfono Fijo') }}</label>

                                        <div class="col-md-6">
                                            <input id="telefono_fijo" type="text" class="form-control @error('telefono_fijo') is-invalid @enderror"
                                                name="telefono_fijo" value="{{ old('telefono_fijo') }}"
                                                autocomplete="telefono_fijo">

                                                @if ($errors->has('telefono_fijo'))
                                                <span class="text-danger">{{ $errors->first('telefono_fijo') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="direccion_fiscal"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Dirección Fiscal') }}</label>

                                        <div class="col-md-6">
                                            <input id="direccion_fiscal" type="text" class="form-control @error('direccion_fiscal') is-invalid @enderror"
                                                name="direccion_fiscal" value="{{ old('direccion_fiscal') }}"
                                                autocomplete="direccion_fiscal">

                                                @if ($errors->has('direccion_fiscal'))
                                                <span class="text-danger">{{ $errors->first('direccion_fiscal') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="departamento"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>

                                        <div class="col-md-6">
                                            <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror"
                                                name="departamento" value="{{ old('departamento') }}"
                                                autocomplete="departamento">

                                                @if ($errors->has('departamento'))
                                                <span class="text-danger">{{ $errors->first('departamento') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="provincia"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                                        <div class="col-md-6">
                                            <input id="provincia" type="text" 
                                                class="form-control @error('provincia') is-invalid @enderror" 
                                                name="provincia" value="{{ old('provincia') }}"
                                                autocomplete="provincia">

                                                @if ($errors->has('provincia'))
                                                <span class="text-danger">{{ $errors->first('provincia') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="distrito"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Distrito') }}</label>

                                        <div class="col-md-6">
                                            <input id="distrito" type="text" 
                                                class="form-control @error('distrito') is-invalid @enderror" 
                                                name="distrito" value="{{ old('distrito') }}"
                                                autocomplete="distrito">

                                                @if ($errors->has('distrito'))
                                                <span class="text-danger">{{ $errors->first('distrito') }}</span>
                                                @endif
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
                                            <label for="name_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                            <div class="col-md-6">
                                                <input id="name_repre_legal" type="text" class="form-control  @error('name_repre_legal') is-invalid @enderror"
                                                    name="name_repre_legal" value="{{ old('name_repre_legal') }}"
                                                    autocomplete="name_repre_legal">
                                                @if ($errors->has('name_repre_legal'))
                                                <span class="text-danger">{{ $errors->first('name_repre_legal') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="apell_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                            <div class="col-md-6">
                                                <input id="apell_repre_legal" type="text" class="form-control  @error('apell_repre_legal') is-invalid @enderror"
                                                    name="apell_repre_legal" value="{{ old('apell_repre_legal') }}"
                                                    autocomplete="apell_repre_legal">
                                                @if ($errors->has('apell_repre_legal'))
                                                <span class="text-danger">{{ $errors->first('apell_repre_legal') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                                            <div class="col-md-6">
                                                <input id="email_repre_legal" type="email" class="form-control @error('email_repre_legal') is-invalid @enderror"
                                                    name="email_repre_legal" value="{{ old('email_repre_legal') }}"
                                                    autocomplete="email_repre_legal">
                                                    @if ($errors->has('email_repre_legal'))
                                                    <span class="text-danger">{{ $errors->first('email_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dni_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                                            <div class="col-md-6">
                                                <input id="dni_repre_legal" type="text" class="form-control @error('dni_repre_legal') is-invalid @enderror"
                                                    name="dni_repre_legal" value="{{ old('dni_repre_legal') }}"
                                                    autocomplete="dni_repre_legal">
                                                    @if ($errors->has('dni_repre_legal'))
                                                    <span class="text-danger">{{ $errors->first('dni_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="celular_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                                            <div class="col-md-6">
                                                <input id="celular_repre_legal" type="text" class="form-control @error('celular_repre_legal') is-invalid @enderror"
                                                    name="celular_repre_legal" value="{{ old('celular_repre_legal') }}"
                                                    autocomplete="celular_repre_legal">

                                                    @if ($errors->has('celular_repre_legal'))
                                                    <span class="text-danger">{{ $errors->first('celular_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="domicilio_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Domicilio') }}</label>

                                            <div class="col-md-6">
                                                <input id="domicilio_repre_legal" type="text" class="form-control @error('domicilio_repre_legal') is-invalid @enderror"
                                                    name="domicilio_repre_legal"
                                                    value="{{ old('domicilio_repre_legal') }}"
                                                    autocomplete="domicilio_repre_legal">

                                                    @if ($errors->has('domicilio_repre_legal'))
                                                    <span class="text-danger">{{ $errors->first('domicilio_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nacionalidad_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>

                                            <div class="col-md-6">
                                                <input id="nacionalidad_repre_legal" type="text" class="form-control @error('nacionalidad_repre_legal') is-invalid @enderror"
                                                    name="nacionalidad_repre_legal"
                                                    value="{{ old('nacionalidad_repre_legal') }}"
                                                    autocomplete="nacionalidad_repre_legal">

                                                    @if ($errors->has('nacionalidad_repre_legal'))
                                                    <span class="text-danger">{{ $errors->first('nacionalidad_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ocupacion_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Ocupacion') }}</label>

                                            <div class="col-md-6">
                                                <input id="ocupacion_repre_legal" type="text" class="form-control @error('ocupacion_repre_legal') is-invalid @enderror"
                                                    name="ocupacion_repre_legal"
                                                    value="{{ old('ocupacion_repre_legal') }}"
                                                    autocomplete="ocupacion_repre_legal">
                                                    @if ($errors->has('ocupacion_repre_legal'))
                                                    <span class="text-danger">{{ $errors->first('ocupacion_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="politico_repre_legal"
                                                class="col-md-4 col-form-label text-md-right">{{ __('¿Es Ud. una persona politicamente expuesta?') }}</label>

                                            <div class="col-md-6 text-left">
                                                <div class="form-check form-check-inline mt-3">
                                                    <label class="form-check-label mr-1" for="si">Si</label>
                                                    <input class="form-check-input mr-4" type="radio"
                                                        name="politico_repre_legal" id="si_politico_legal" value="si"
                                                        onclick="showPoliticoLegalContainer();">
                                                    <label class="form-check-label mr-1" for="no">No</label>
                                                    <input class="form-check-input" type="radio"
                                                        name="politico_repre_legal" id="no_politico_legal" value="no"
                                                        onclick="showPoliticoLegalContainer();">
                                                </div>

                                                @if ($errors->has('politico_repre_legal'))
                                                    <span class="text-danger d-block">{{ $errors->first('politico_repre_legal') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div id="politico-legal-container" style="display: none;">

                                            <div class="form-group row">
                                                <label for="cargo_repre_legal"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                                <div class="col-md-6">
                                                    <input id="cargo_repre_legal" type="text" class="form-control"
                                                        name="cargo_repre_legal" value="{{ old('cargo_repre_legal') }}"
                                                        autocomplete="cargo_repre_legal">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="empresa_repre_legal"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                                                <div class="col-md-6">
                                                    <input id="empresa_repre_legal" type="text" class="form-control"
                                                        name="empresa_repre_legal"
                                                        value="{{ old('empresa_repre_legal') }}"
                                                        autocomplete="empresa_repre_legal">
                                                </div>
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
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="name_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                            <div class="col-md-6">
                                                <input id="name_per_operaciones" type="text" class="form-control @error('name_per_operaciones') is-invalid @enderror"
                                                    name="name_per_operaciones"
                                                    value="{{ old('name_per_operaciones') }}"
                                                    autocomplete="name_per_operaciones">
                                                    @if ($errors->has('name_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('name_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="apell_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                            <div class="col-md-6">
                                                <input id="apell_per_operaciones" type="text" class="form-control @error('apell_per_operaciones') is-invalid @enderror"
                                                    name="apell_per_operaciones"
                                                    value="{{ old('apell_per_operaciones') }}"
                                                    autocomplete="apell_per_operaciones">
                                                    @if ($errors->has('apell_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('apell_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label for="dni_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                                            <div class="col-md-6">
                                                <input id="dni_per_operaciones" type="text" class="form-control @error('dni_per_operaciones') is-invalid @enderror"
                                                    name="dni_per_operaciones" value="{{ old('dni_per_operaciones') }}"
                                                    autocomplete="dni_per_operaciones">
                                                    @if ($errors->has('dni_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('dni_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="celular_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                                            <div class="col-md-6">
                                                <input id="celular_per_operaciones" type="text" class="form-control @error('celular_per_operaciones') is-invalid @enderror"
                                                    name="celular_per_operaciones"
                                                    value="{{ old('celular_per_operaciones') }}"
                                                    autocomplete="celular_per_operaciones">
                                                    @if ($errors->has('celular_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('celular_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="domicilio_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Domicilio') }}</label>

                                            <div class="col-md-6">
                                                <input id="domicilio_per_operaciones" type="text" class="form-control @error('domicilio_per_operaciones') is-invalid @enderror"
                                                    name="domicilio_per_operaciones"
                                                    value="{{ old('domicilio_per_operaciones') }}"
                                                    autocomplete="domicilio_per_operaciones">
                                                    @if ($errors->has('domicilio_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('domicilio_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nacionalidad_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidad') }}</label>

                                            <div class="col-md-6">
                                                <input id="nacionalidad_per_operaciones" type="text"
                                                    class="form-control @error('nacionalidad_per_operaciones') is-invalid @enderror" name="nacionalidad_per_operaciones"
                                                    value="{{ old('nacionalidad_per_operaciones') }}"
                                                    autocomplete="nacionalidad_per_operaciones">
                                                    @if ($errors->has('nacionalidad_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('nacionalidad_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ocupacion_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Ocupacion') }}</label>

                                            <div class="col-md-6">
                                                <input id="ocupacion_per_operaciones" type="text" class="form-control @error('ocupacion_per_operaciones') is-invalid @enderror"
                                                    name="ocupacion_per_operaciones"
                                                    value="{{ old('ocupacion_per_operaciones') }}"
                                                    autocomplete="ocupacion_per_operaciones">
                                                    @if ($errors->has('ocupacion_per_operaciones'))
                                                    <span class="text-danger">{{ $errors->first('ocupacion_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="politico_per_operaciones"
                                                class="col-md-4 col-form-label text-md-right">{{ __('¿Es Ud. una persona politicamente expuesta?') }}</label>

                                            <div class="col-md-6 text-left">
                                                <div class="form-check form-check-inline mt-3">
                                                    <label class="form-check-label mr-1" for="si">Si</label>
                                                    <input class="form-check-input mr-4" type="radio"
                                                        name="politico_per_operaciones" id="si_per_operaciones"
                                                        value="si" onclick="showPoliticoOperacionesContainer();">
                                                    <label class="form-check-label mr-1" for="no">No</label>
                                                    <input class="form-check-input" type="radio"
                                                        name="politico_per_operaciones" id="no_per_operaciones"
                                                        value="no" onclick="showPoliticoOperacionesContainer();">
                                                </div>
                                                @if ($errors->has('politico_per_operaciones'))
                                                    <span class="text-danger d-block">{{ $errors->first('politico_per_operaciones') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div id="politico-operaciones-container" style="display: none;">

                                            <div class="form-group row">
                                                <label for="cargo_per_operaciones"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                                                <div class="col-md-6">
                                                    <input id="cargo_per_operaciones" type="text" class="form-control"
                                                        name="cargo_per_operaciones"
                                                        value="{{ old('cargo_per_operaciones') }}"
                                                        autocomplete="cargo_per_operaciones">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="empresa_per_operaciones"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Empresa') }}</label>

                                                <div class="col-md-6">
                                                    <input id="empresa_per_operaciones" type="text" class="form-control"
                                                        name="empresa_per_operaciones"
                                                        value="{{ old('empresa_per_operaciones') }}"
                                                        autocomplete="empresa_per_operaciones">
                                                </div>
                                            </div>
                                        </div>
                            

                                            <div class="form-group row">
                                                <label for="email_per_operaciones"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>
                                                <div class="col-md-6">
                                                    <input id="correo_per_operaciones" type="email" class="form-control @error('correo_per_operaciones') is-invalid @enderror"
                                                        name="correo_per_operaciones"
                                                        value="{{ old('correo_per_operaciones') }}"
                                                        autocomplete="correo_per_operaciones">
                                                        @if ($errors->has('correo_per_operaciones'))
                                                        <span class="text-danger">{{ $errors->first('correo_per_operaciones') }}</span>
                                                        @endif
                                                </div>
                                            </div>                      

                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
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

                                           

                                            </div>
                                            <div class="text-center">
                                                <a class="btn btn-primary1" onclick="stepper1.previous()">Anterior</a>
                                                <a class="btn btn-primary" onclick="stepper1.next()">Siguiente</a>
                                            </div>
                                        </div>

                                        
                                            <div id="test-l-4" role="tabpanel" class="bs-stepper-pane"
                                                aria-labelledby="stepper1trigger4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label for="ficha_ruc_emp" class="col-md-4 col-form-label text-md-right">Ficha RUC Empresa</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="ruc-file-input" name="ruc_doc" id="ruc-id"
                                                                        aria-describedby="ruc-id"
                                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                                    <label class="custom-file-label" for="ruc-id">
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('ruc_doc'))
                                                                <span class="text-danger">{{ $errors->first('ruc_doc') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="representante_legal" class="col-md-4 col-form-label text-md-right">DNI Representante Legal</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="dni-file-input" name="dni_doc"
                                                                        id="dni-id" aria-describedby="dni-id"
                                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                                    <label class="custom-file-label" for="dni-id">
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('dni_doc'))
                                                                <span class="text-danger">{{ $errors->first('dni_doc') }}</span>
                                                                @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="vigencia" class="col-md-4 col-form-label text-md-right">Vigencia de Poderes</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="poderes-file-input" name="poderes_doc"
                                                                        id="poderes-id" aria-describedby="poderes-id"
                                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                                    <label class="custom-file-label" for="poderes-id"></label>
                                                                </div>
                                                            </div>
                                                            @if ($errors->has('poderes_doc'))
                                                                <span class="text-danger">{{ $errors->first('poderes_doc') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="dni_operador" class="col-md-4 col-form-label text-md-right">DNI Operador(Opcional)</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="dni-ope-file-input" name="dni_ope_doc"
                                                                        id="dni-ope-id" aria-describedby="dni-ope-id"
                                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                                    <label class="custom-file-label" for="dni-ope-id">
                                                                        </label>
                                                                </div>
                                                            </div>    
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
                                                                <span class="text-danger">{{ $errors->first('terminos') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-center">
                                                    <a class="btn btn-primary1" onclick="stepper1.previous()">Anterior</a>
                                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                                </div>
                                            </div>
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
function showGrupoContainer() {
    if (document.getElementById('si_grupo').checked) {
        document.getElementById('grupo-container').style.display = 'block';
    }
    else document.getElementById('grupo-container').style.display = 'none';
}

function showPoliticoLegalContainer() {
    if (document.getElementById('si_politico_legal').checked) {
        document.getElementById('politico-legal-container').style.display = 'block';
    }
    else document.getElementById('politico-legal-container').style.display = 'none';
}

function showPoliticoOperacionesContainer() {
    if (document.getElementById('si_per_operaciones').checked) {
        document.getElementById('politico-operaciones-container').style.display = 'block';
    }
    else document.getElementById('politico-operaciones-container').style.display = 'none';
}

document.querySelector('.ruc-file-input').addEventListener('change',function(e){ 
  var fileName = document.getElementById("ruc-id").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

document.querySelector('.dni-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("dni-id").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

document.querySelector('.poderes-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("poderes-id").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

document.querySelector('.dni-ope-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("dni-ope-id").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

</script>

@stop