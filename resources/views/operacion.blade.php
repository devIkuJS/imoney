<style>
    .container {
        margin-top: -11px !important;

    }


    .card-header {
        background: #0274be !important;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
        text-align: center;
    }

    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }

    .col-form-label {
        color: gray;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
    }

    .btn-primary1 {
        background-color: #C0BEBF !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        margin-top: 25px;
        border-radius: 50px !important;
        width: 211px;

    }

    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background: #0274be !important;
        margin-top: 25px;
        border-radius: 50px !important;
        width: 211px;
    }

    .btn-primary3 {
        background-color: #0274be !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);

    }

    .btn-primary4 {
        background-color: #0274be !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);

    }

    .btn-primary10 {
        background-color: #0274be !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        margin-bottom: 100px;

    }

    .form-check-label2 {
        color: black !important;
        font-weight: bold !important;
        color: #004976 !important;
        font-size: 11px;
        line-height: 12px;
        font-weight: 600;
    }

    .card {
        margin-bottom: 50px;
        border-radius: 40px !important;
    }

    h4 {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        color: #2375f0 !important;
        margin-bottom: 30px !important;
        font-size: 14px;
        text-align: center;
    }

    p {
        color: #0274be !important;
        font-size: 20px;
    }

    .selecciona-Banco {
        color: #004976 !important;
        font-size: 17px;
        font-weight: normal;
        line-height: 1.29;
        text-align: center;
        margin: auto;
        margin-bottom: 16px;
        width: 398px;
    }

    .selecciona-Cuenta {
        color: #004976 !important;
        font-size: 17px;
        font-weight: normal;
        line-height: 1.29;
        text-align: center;

    }
</style>
@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tu cambio para hoy es') }}</div>

                <div class="card-body pb-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group d-flex">
                                <div class="col-md-4 col-xs-5">
                                    <p class="text-ttleft14">ENVÍAS</p>
                                    <p class="text-rectangl15 mrg-0px" id="envias">
                                        <p class="text-rectangl15 mrg-0px">{{$dataTipoCambio["montoA"]}}
                                            {{$dataTipoCambio["descripcionMontoA"]}}</p>
                                    </p>
                                </div>
                                <div class="col-md-1 col-xs-1 dis-fle">
                                    <img alt="" src="imagenes/flecha-derecha.png">
                                </div>
                                <div class="col-md-4 col-xs-6 col-resp6">
                                    <p class="text-ttleft14">RECIBES</p>
                                    <p class="text-rectangl15 mrg-0px" id="recibes">
                                        <p class="text-rectangl15 mrg-0px">{{$dataTipoCambio["montoB"]}}
                                            {{$dataTipoCambio["descripcionMontoB"]}}</p>
                                    </p>
                                </div>
                                <div class="col-md-3 col-xs-12  pdg-resp1">
                                    <p class="text-ttleft14" style="color: #22abf1 !important;">TIPO DE CAMBIO</p>
                                    <p class="text-rectangl15 mrg-0px" id="tipoCambio">
                                        <p class="text-rectangl15 mrg-0px">{{$dataTipoCambio["tipoCambio"]}}</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-hijo1">
                        <div class="row">
                            <div class="col">
                                <h4>¿DESDE QUÉ BANCO ENVÍAS TU DINERO?</h4>
                                <p class="selecciona-Banco">Selecciona el banco de donde transferirás el dinero para
                                    tu cambio.</p>

                                <select class="form-control" id="bancos" name="bancos">
                                    <option value="">Seleccione el banco</option>
                                    @foreach ($bancos as $banco)
                                    <option value="{{$banco->id}}">{{$banco->name}}</option>
                                    @endforeach
                                </select>

                                <div class="form-check mt-3">
                                    <input type="checkbox" name="declaro" class="form-check-input" id="accept">

                                    <label class="form-check-label2" for="accept">Declaro que transfireré los fondos
                                        a Imoney desde una cuenta bancaria de pruebaAlex
                                        de la cual soy titular o con autorización del representante legal.</label>

                                </div>
                                @if ($errors->has('declaro'))
                                <span class="text-danger d-block">{{ $errors->first('declaro') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <h4>¿EN QUÉ CUENTA DESEAS RECIBIR TU DINERO?</h4>
                                <p class="selecciona-Cuenta">Selecciona la cuenta en donde deseas recibir tu cambio,
                                    puede
                                    ser propia o de terceros.</p>



                                <a id="seleccionar-cuenta" class="dis-itmcent text-selectCount color-btnsky">
                                    <button type="button" class="btn btn-primary3" data-toggle="modal"
                                        data-target="#modal-listar-cuenta"><i
                                            class="far fa-address-card"></i>&nbsp;SELECCIONAR CUENTA
                                    </button>
                                </a>


                                <a id="agregar-cuenta" class="dis-itmcent text-selectCount color-btnsky">
                                    <button type="button" class="btn btn-primary4" data-toggle="modal"
                                        data-target="#modal-agregar-cuenta"><i
                                            class="fa fa-plus-circle"></i>&nbsp;AGREGAR
                                        NUEVA CUENTA
                                    </button>
                                </a>

                                <div id="cuenta-selected" class="mt-3"></div>

                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary1" href="{{ route('tipoCambio') }}">Regresar</a>
                            <button class="btn btn-primary" id="procesar-operacion">Procesar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Listar Cuenta -->
    <div class="modal fade" id="modal-listar-cuenta" tabindex="-1" role="dialog" aria-labelledby="modal-listar-cuenta"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-listar-cuenta">Lista de cuentas en
                        {{ $dataTipoCambio["descripcionMontoB"] }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($lista_cuenta_bancaria as $cbancaria)
                    <div class="card">
                        <div class="card-body">
                            <input class="form-check-input" type="radio" name="cbancaria_selected"
                                id="radio_{{$cbancaria->id }}" value="{{$cbancaria->id }}">
                            <h5 class="card-title">Banco: {{$cbancaria->banco}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Numero de Cuenta: {{$cbancaria->numero_cuenta}}
                                <h6 class="card-subtitle mb-2 text-muted">Tipo de Cuenta: {{$cbancaria->tipo_cuenta}}
                                </h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="modal-footer">
                        <button class="btn btn-primary10" id="seleccionar-tipo-cuenta">Seleccionar</button>
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
                        {{ $dataTipoCambio["descripcionMontoB"] }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('operacion.createCuentaBancaria') }}">
                        @csrf
                        <input type="hidden" name="tipo_cuenta" value="{{ $dataTipoCambio["descripcionMontoB"] }}" />
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


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary10" id="agregar-tipo-cuenta">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Agregar Cuenta -->

    @endsection

    @section('custom-script')
    <script type="text/javascript">
        $('#seleccionar-tipo-cuenta').click(function() {
    var value = $('input[name=cbancaria_selected]:checked').val();

    $.ajax({
    type: 'GET',
    url: `operacion/${value}/getCuentaBancariaSelected`,
    success: function (data) {
        $("#cuenta-selected").html(
            '<h4>Cuenta Seleccionada</h4>'+
            '<div class="card">'+
            '<div class="card-body">'+
                '<h5 class="card-title">Banco: '+data[0].banco+'</h5>'+
                '<h6 class="card-subtitle mb-2 text-muted">Numero de Cuenta: '+data[0].numero_cuenta+'</h6>'+
                '<h6 class="card-subtitle mb-2 text-muted">Tipo de cuenta: '+data[0].tipo_cuenta+'</h6>'+
                '</div>'+
         '</div>');

        $('#modal-listar-cuenta').modal('hide');

    },
    error: function() { 
         console.log(data);
    }
    });

  });


  $('#procesar-operacion').click(function() {

    $.ajax({
        type: "POST",
        url: "{{ route('operacion.createOperacion')}}",
        data: { 
        bancos: $('#bancos').val(),
        descripcionMontoA: '{{$dataTipoCambio["descripcionMontoA"]}}',
        montoA: '{{$dataTipoCambio["montoA"]}}',
        descripcionMontoB: '{{$dataTipoCambio["descripcionMontoB"]}}',
        montoB: '{{$dataTipoCambio["montoB"]}}',
        cuenta_destino: $('input[name=cbancaria_selected]:checked').val(),
        tipo_cuenta: '{{$dataTipoCambio["descripcionMontoB"]}}',
        _token:"{{ csrf_token() }}",
        },
        success: function (data) {
        window.location.href = `transaccion/${data}`;

        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);

        },
    });

});



    </script>

    @stop