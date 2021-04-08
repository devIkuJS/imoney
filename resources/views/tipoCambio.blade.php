
<style>
   
    .card-deck-wrapper2{
        margin-top:35px;
    }
    
    .card-title{
        text-align:center;
        color: #0274be;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
    }
    
</style>

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row ">
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{URL::to('inversionista/')}}">
                            <img class="card-img-top" src={{asset('imagenes/inversionista.png')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">INVERSIONISTAS</h4> 
                            </a>
                        </div>
                    </div>
                    
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{URL::to('financiamiento/')}}">
                            <img class="card-img-top" src={{asset('imagenes/financiamiento.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">FINANCIAMIENTO</h4>                        
                            </a>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{URL::to('cambioTipo/')}}">
                            <img class="card-img-top" src={{asset('imagenes/tipo-de-cambio.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">TIPO DE CAMBIO</h4>                            
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div> 
    
    <div class="row">
            <div class="card-deck-wrapper2">
                <div class="card-deck">
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{URL::to('misDatos/')}}">
                            <img class="card-img-top" src={{asset('imagenes/mis_datos.png')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Mis Datos</h4>
                            
                            </a>
                        </div>
                    </div>

                    
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{URL::to('cuentaBancaria/')}}">
                            <img class="card-img-top" src={{asset('imagenes/cuenta_bancaria.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Cuentas Bancarias</h4>
                                
                            </a>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{URL::to('estadoCuenta/')}}">
                            <img class="card-img-top" src={{asset('imagenes/estado_cuenta.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Estado de Cuenta</h4>  
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>    
</div>
@endsection