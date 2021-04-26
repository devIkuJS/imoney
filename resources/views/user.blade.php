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

    /* .card {
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        background-color: transparent;
    }
    */

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    */
</style>

@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="text-center"><span class="font-weight-bold text-white h2">Hola, </span><span
                class="font-weight-bold h2">{{ Auth::user()->name }}</span>
        </div>
        <h3 class="text-center font-weight-bold text-white">¡BIENVENIDO! Elige la operación que quieres realizar</h3>

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
                        <a href="{{ route('financiamiento') }}">
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
    </div>
</main>

@endsection