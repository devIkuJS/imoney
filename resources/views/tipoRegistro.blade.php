<style>
    .card-header{
        background:#0274be !important;
        color:white !important;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 14px;
    }
  
    .font-weight-bold{
        color:#0274be !important;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        margin-top:10px;
    }
    
</style>
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header"><img src={{asset('imagenes/logo_alex.png')}} alt="Fjords" style="width:10%" class="img-fluid"> {{ __('SELECCIONA TU PERFIL') }}</div>

                <div class="card-body mx-auto">
                    <div class="text-center mb-5 mt-2">
                        <a class="icon-block" href="{{ route('register') }}">
                            <img src={{asset('imagenes/persona100.png')}} alt="Fjords" style="width:40%" class="img-fluid">
                        </a>
                        <p class="font-weight-bold">Persona Natural</p>
                    </div>
                    <div class="text-center">
                        <a class="icon-block" href="{{ route('empresa') }}">
                            <img src={{asset('imagenes/empresa300.png')}} alt="Fjords" style="width:40%" class="img-fluid">
                        </a>
                        <p class="font-weight-bold">Empresa</p>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
