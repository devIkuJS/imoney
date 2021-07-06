<style>
    .background-card {
        background: transparent !important;
        border: none !important;
    }

    .card-title {
        color: #fff;
        text-transform: uppercase;
        font-weight: bold;
    }

    .card-img-top {
        width: 100%;
        height: 20vh;
        object-fit: contain;
    }


    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }


</style>

@extends('layouts.app')
@section('content')
<main>
    <div class="container pt-5">

    <div class="text-center"><span class="font-weight-bold text-white h2">Hola, </span><span
                id="hi2" class="font-weight-bold h2"></span>
        </div>
        <h3 class="text-center font-weight-bold text-white">&#161;BIENVENIDO! Elige la operaci&oacute;n que quieres realizar</h3>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card-deck">
                    <div class="card background-card">
                        <a href="{{ route('tipoCambio') }}"><img src={{asset('imagenes/TIPO_DE_CAMBIO.png')}}
                                class="card-img-top" alt="Imagen Tipo de cambio"></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">Tipo de Cambio</h4>
                        </div>
                    </div>
                    <div class="card background-card">
                        <a href="{{ route('inversionista') }}">
                            <img src={{asset('imagenes/INVERSIONISTA2.png')}} class="card-img-top"
                                alt="Imagen Inversionista"></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">Inversión</h4>
                        </div>
                    </div>
                    <div class="card background-card">
                        <a href="{{ route('financiamiento') }}">
                            <img src={{asset('imagenes/FINANCIAMIENTO.png')}} class="card-img-top"
                                alt="Imagen Financiamiento">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title text-center">Financiamiento</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card-deck">
                    <div class="card background-card">
                        <a href="{{ route('misDatos') }}"><img src={{asset('imagenes/MIS_DATOS.png')}}
                                class="card-img-top" alt="Imagen Mis datos"></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">Mis datos</h4>
                        </div>
                    </div>
                    <div class="card background-card">
                        <a href="{{ route('cuentaBancaria') }}">
                            <img src={{asset('imagenes/CUENTAS_BANCARIAS2.png')}} class="card-img-top"
                                alt="Imagen cuentas"></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">Cuentas bancarias</h4>
                        </div>
                    </div>
                    <div class="card background-card">
                        <a href="{{ route('estadoCuenta') }}">
                            <img src={{asset('imagenes/ESTADOS_CUENTA.png')}} class="card-img-top"
                                alt="Imagen Estados">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title text-center">Estado de cuenta</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

@section('custom-script')
<script type="text/javascript">

$(document).ready(function() {
$.ajax({
    url: `/user/razonSocial`,
	success: function(respuesta) {
		console.log(respuesta);
		$("#hi2").html(respuesta);
	},
	error: function() {
        console.log("No se ha podido obtener la informacion");
    }
});

});
</script>

@stop