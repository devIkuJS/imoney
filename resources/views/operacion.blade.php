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

    .div-border{
        border:2px solid #fff;
        border-radius:10px;

    }

    .content-label{
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

        .space-div{
            margin-top:2rem;
        }


    }

</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row">

            <div class="col-md-12 text-center">
                <h3 class="text-white font-weight-bold">Confirmacion de operacion FX -
                    {{ date('d-m-Y', strtotime(now())) }}</h3>
            </div>
            <div class="col-md-6 mx-auto">

                <div class="col-md-12">

                    <div class="row mt-4 text-center py-4 div-border">
                        <div class="col-4">
                            <h4 class="font-weight-bold text-white">Envias</h4>
                            <h5 class="font-weight-bold text-white">{{$dataTipoCambio["montoA"]}}
                                {{$dataTipoCambio["descripcionMontoA"]}}</h5>
                        </div>
                        <div class="col-4">
                            <h4 class="font-weight-bold text-white">Recibes</h4>
                            <h5 class="font-weight-bold text-white">{{$dataTipoCambio["montoB"]}}
                                {{$dataTipoCambio["descripcionMontoB"]}}</h5>
                        </div>
                        <div class="col-4">
                            <h4 class="font-weight-bold text-white">Tipo de cambio</h4>
                            <h5 class="font-weight-bold text-white">{{$dataTipoCambio["tipoCambio"]}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold text-center">¿Desde que banco nos envías tu dinero?</h5>
                        <p class="text-center">Selecciona el banco de donde transferiras el dinero para tu cambio</p>
                        <div class="form-group">
                            <select class="form-control" id="bancos" name="bancos">
                                <option value="">Seleccione el banco</option>
                                @foreach ($bancos as $banco)
                                <option value="{{$banco->id}}">{{$banco->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check mt-3">
                            <input type="checkbox" name="declaro" class="form-check-input" id="accept" style="margin-top: 13px;width:18px;height:18px;margin-left: -1.7rem !important;">

                            <label class="form-check-label text-white font-weight-bold" for="accept">Declaro que
                                transfireré los fondos
                                a Imoney Perú S.A.C. desde una cuenta bancaria de <span> {{Auth::user()->name}}</span>
                                de la cual soy titular o con autorización del representante legal.</label>

                        </div>
                    </div>

                    <div class="col-md-6 space-div">
                        <h5 class="font-weight-bold text-center">¿En que cuenta deseas recibir tu dinero?</h5>
                        <p class="text-center">Selecciona la cuenta en donde deseas recibir tu cambio</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-dark mr-2" data-toggle="modal"
                                data-target="#modal-listar-cuenta"><i
                                    class="far fa-address-card pr-2"></i>Seleccionar cuenta
                            </button>

                            <button type="button" class="btn btn-dark ml-2" data-toggle="modal"
                                data-target="#modal-agregar-cuenta"><i
                                    class="fa fa-plus-circle pr-2"></i>Agregar cuenta
                            </button>
                        </div>
                        <div id="cuenta-selected" class="text-center col-md-6 mt-3 mx-auto"></div>
                    </div>
                    
                </div>

            </div>

            <div class="text-center col-md-12 mt-4">
                <a class="btn btn-primary btn-regresar mr-3" href="{{ route('tipoCambio') }}">Atrás</a>
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
                {{ $dataTipoCambio["descripcionMontoB"] }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @foreach ($lista_cuenta_bancaria as $cbancaria)
            <label class="content-label">
                <input type="radio" name="cbancaria_selected" class="card-input-element d-none" id="radio_{{$cbancaria->id }}" value="{{$cbancaria->id }}">
                <div class="card card-body bg-light">
                    <h5 class="card-title">Banco: {{$cbancaria->banco}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Numero de Cuenta: {{$cbancaria->numero_cuenta}}
                    <h6 class="card-subtitle mb-2 text-muted">Tipo de Cuenta: {{$cbancaria->tipo_cuenta}}</h6>
                </div>
                </label>
            @endforeach
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
                    <button type="submit" class="btn btn-primary" id="agregar-tipo-cuenta">Agregar</button>
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
        '<h5 class="text-center font-weight-bold">Cuenta Seleccionada</h5>'+
        '<div class="div-border px-3 py-3">'+
            '<h5 class="text-white font-weight-bold">Banco: '+data[0].banco+'</h5>'+
            '<h6 class="text-white mb-2">#Cuenta: '+data[0].numero_cuenta+'</h6>'+
            '<h6 class="text-white mb-2">Tipo de cuenta: '+data[0].tipo_cuenta+'</h6>'+
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