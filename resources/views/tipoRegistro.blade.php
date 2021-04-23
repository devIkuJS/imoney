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
        color:#0274be !important;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        margin-top:10px !important;
    }
       
</style>
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><img src={{asset('imagenes/logo_alex.png')}} alt="Fjords" style="width:10%" class="img-fluid2"> {{ __('SELECCIONA TU PERFIL') }}</div>

                <div class="card-body mx-auto">
                    <div class="text-center mb-5 mt-2">
                        <a class="icon-block" href="{{ route('register') }}">
                            <img src={{asset('imagenes/persona100.png')}} alt="Fjords" style="width:80%" class="img-fluid">
                        </a>
                        <p class="font-weight-bold">Persona Natural</p>
                    </div>
                    <div class="text-center">
                        <a class="icon-block" href="{{ route('empresa') }}">
                            <img src={{asset('imagenes/empresa300.png')}} alt="Fjords" style="width:80%" class="img-fluid">
                        </a>
                        <p class="font-weight-bold">Empresa</p>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
