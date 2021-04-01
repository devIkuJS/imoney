<style>
    .card-header{
        background:#0274be !important;
        color:white !important;
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
                <div class="card-header">{{ __('SELECCIONA TU PERFIL') }}</div>

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
