
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
    .card{
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    }
    .card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }
    
</style>

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('tipoCambio') }}">
                            <img class="card-img-top" src={{asset('imagenes/inversionista.png')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Tipo de Cambio</h4> 
                            </a>
                        </div>
                    </div>
                    
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('financiamiento') }}">
                            <img class="card-img-top" src={{asset('imagenes/financiamiento.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Financiamiento</h4>                        
                            </a>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('inversionista') }}">
                            <img class="card-img-top" src={{asset('imagenes/tipo-de-cambio.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Inversionistas</h4>                            
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
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('misDatos') }}">
                            <img class="card-img-top" src={{asset('imagenes/mis_datos.png')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Mis Datos</h4>
                            
                            </a>
                        </div>
                    </div>

                    
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('cuentaBancaria') }}">
                            <img class="card-img-top" src={{asset('imagenes/cuenta_bancaria.jpg')}} alt="Card image" style="width:50%">
                                <h4 class="card-title">Cuentas Bancarias</h4>
                                
                            </a>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('estadoCuenta') }}">
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

