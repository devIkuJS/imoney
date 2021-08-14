<style>
    .container{
        margin-top: 55px !important;
    }
    .card-header{
        background:#0274be !important;
        color:white !important;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 15px;
    }

    .img-fluid2{
        margin: 10px;
        margin-top: 0px;
        margin-left:-10px;
        margin-right:10px;
    }
    .img-fluid:hover{
        opacity: 0.5;
        transform: scale(1.25);
        transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    }
    .font-weight-bold{
        color:white !important;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        margin-top:10px !important;
    }
    
    @media (max-width: 575.98px) {
        .text-center {
            font-size:17px;
        }
    }
       
</style>
@extends('layouts.app')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">                
                <div class="card" style="background: transparent !important;border-style: none;">
                    <div class="card-header" style="background: transparent !important;border-style: none;">
                        <h2 class="text-center font-weight-bold">{{ __('SELECCIONA TU PERFIL') }}</h2></div>
                    <div class="card-body mx-auto">
                        <div class="text-center mb-5 mt-2">
                            <a class="icon-block" href="{{ route('financiamientoPersonaNatural') }}">
                                <img src={{asset('imagenes/persona100.png')}} alt="Fjords" style="width:30%" class="img-fluid">
                            </a>
                            <p class="font-weight-bold text-white">Persona Natural</p>
                        </div>
                        <div class="text-center">
                            <a class="icon-block" href="{{ route('financiamientoEmpresa') }}">
                                <img src={{asset('imagenes/empresa_original.png')}} alt="Fjords" style="width:30%" class="img-fluid">
                            </a>
                            <p class="font-weight-bold text-white">Empresa</p>
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
