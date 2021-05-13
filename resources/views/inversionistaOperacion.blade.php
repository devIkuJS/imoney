<style>
    .btn-regresar {
        background-color: #C0BEBF !important;
        font-weight: bold !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        padding-left: 30px !important;
        padding-right: 30px !important;
        font-size: 1.1rem !important;
    }

    .btn-procesar {
        background-color: black !important;
        font-weight: bold !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        padding-left: 30px !important;
        padding-right: 30px !important;
        font-size: 1.1rem !important;
        border-color: transparent !important;
    }

    .div-border {
        border: 2px solid #fff;
        border-radius: 10px;

    }

    .content-label {
        width: 100%;
    }

    .card-input-element+.card {
        color: var(--primary);
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 2px solid transparent;
        border-radius: 4px;
    }

    .card-input-element+.card:hover {
        cursor: pointer;
    }

    .card-input-element:checked+.card {
        border: 2px solid var(--primary);
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
    }

    .card-input-element:checked+.card::after {
        content: '\f058';
        color: #AFB8EA;
        font-family: 'Font Awesome 5 Free';
        font-size: 24px;
        -webkit-animation-name: fadeInCheckbox;
        animation-name: fadeInCheckbox;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    .text-error {
        color: #8f0000;
    }

    @-webkit-keyframes fadeInCheckbox {
        from {
            opacity: 0;
            -webkit-transform: rotateZ(-20deg);
        }

        to {
            opacity: 1;
            -webkit-transform: rotateZ(0deg);
        }
    }

    @keyframes fadeInCheckbox {
        from {
            opacity: 0;
            transform: rotateZ(-20deg);
        }

        to {
            opacity: 1;
            transform: rotateZ(0deg);
        }
    }


    @media (max-width: 575.98px) {
        .space-div {
            margin-top: 2rem;
        }

    }
    
</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row">

            <div class="col-md-12 text-center">
                <h3 class="text-white font-weight-bold">Confirmacion de Inversión FX -
                    {{ date('d-m-Y', strtotime(now())) }}</h3>
            </div>
            <div class="col-md-6 mx-auto">

                <div class="col-md-12">

                    <div class="row mt-4 text-center py-4 div-border">
                        <div class="col-12">
                            <h4 class="font-weight-bold text-white">Envias</h4>
                            <h5 class="font-weight-bold text-white"></h5>
                        </div>
                        <!--<div class="col-4">
                            <h4 class="font-weight-bold text-white">Recibes</h4>
                            <h5 class="font-weight-bold text-white"></h5>
                        </div>
                        <div class="col-4">
                            <h4 class="font-weight-bold text-white">Tipo de cambio</h4>
                            <h5 class="font-weight-bold text-white"></h5>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold text-center">¿Desde que banco envías tu dinero?</h5>
                        <p class="text-center">Selecciona el banco donde deseas recibir el dinero de tu inversión</p>
                        <div class="form-group">
                            <select class="form-control" id="bancos" name="bancos">
                                    <option value="">Seleccione el banco</option>
                                    @foreach ($bancos as $banco)
                                    <option value="{{$banco->id}}">{{$banco->name}}</option>
                                    @endforeach
                            </select>

                            <div id="err-banco-envio"></div>
                        </div>
                        <div class="form-check mt-3">
                            <input type="checkbox" name="declaro" class="form-check-input" id="accept"
                                style="margin-top: 13px;width:18px;height:18px;margin-left: -1.7rem !important;">

                            <label class="form-check-label text-white font-weight-bold" for="accept">Declaro que
                                transfireré los fondos
                                a Imoney Perú S.A.C. desde una cuenta bancaria de <span> {{Auth::user()->name}} {{ Auth::user()->apellidos }}</span>
                                de la cual soy titular o con autorización del representante legal.</label>

                            <div id="err-acepto"></div>

                        </div>
                    </div>

                    <div class="col-md-6 space-div">
                        <h5 class="font-weight-bold text-center">¿En qué cuenta deseas recibir tu capital más ganancia?</h5>
                        <p class="text-center">Selecciona el banco de donde recibirás el dinero de tu inversión</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-dark mr-2" data-toggle="modal"
                                data-target="#modal-listar-cuenta"><i class="far fa-address-card pr-2"></i>Seleccionar
                                cuenta
                            </button>

                            <button type="button" class="btn btn-dark ml-2" data-toggle="modal"
                                data-target="#modal-agregar-cuenta"><i class="fa fa-plus-circle pr-2"></i>Agregar nueva cuenta
                            </button>
                        </div>
                        <div id="err-cbancaria-selected" class="text-center mt-3"></div>
                        <div id="cuenta-selected" class="text-center col-md-6 mt-3 mx-auto"></div>
                    </div>

                </div>

            </div>

            <div class="text-center col-md-12 mt-4">
                <a class="btn btn-primary btn-regresar mr-3" href="{{ route('inversionistaCaracteristica') }}">Atrás</a>
                <button class="btn btn-primary btn-procesar ml-3" id="procesar-operacion">Procesar</button>
            </div>
        </div>
    </div>
    </div>
</main>

<!-- Modal Listar Cuenta -->
<div class="modal fade" id="modal-listar-cuenta" tabindex="-1" role="dialog" aria-labelledby="modal-listar-cuenta"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-listar-cuenta">Lista de cuentas en
                   
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center font-weight-bold" style="color:#2a3253;font-size: 17px;">Esta lista muestra tus cuentas bancarias en moneda</p>
                
                <label class="content-label">
                    <input type="radio" name="cbancaria_selected" class="card-input-element d-none"
                        id="">
                    <div class="card card-body bg-light">
                        <h5 class="card-title"></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                    </div>
                </label>
                
                <div id="err-modal-select-cuenta" class="text-center"></div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="seleccionar-tipo-cuenta">Seleccionar</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal Listar Cuenta -->

<!-- Modal Agregar Cuenta -->
<div class="modal fade" id="modal-agregar-cuenta" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-cuenta"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-agregar-cuenta">Agregar nueva cuenta en
                
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="text-center font-weight-bold mt-3" style="color:#2a3253;font-size: 17px;">Ingresa tu cuenta bancaria en moneda</p>
            <div class="modal-body">
                <input type="hidden" name="tipo_cuenta" value="" />
                <div class="form-group">
                    <select class="form-control" id="cuenta_bancaria_user" name="cuenta_bancaria_user">
                        <option value="">Seleccione el banco</option>
                        @foreach ($bancos as $banco)
                        <option value="{{$banco->id}}">{{$banco->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero_cuenta">Numero de cuenta</label>
                    <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta">
                </div>
                <div class="form-group">
                <select class="form-control" id="categoria_cuenta" name="categoria_cuenta">
                        <option value="">Seleccione el tipo de cuenta</option>
                        @foreach ($categoria_cuenta as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>



                </div>
                <div id="success-message"></div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="agregar-tipo-cuenta">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Agregar Cuenta -->

@endsection
