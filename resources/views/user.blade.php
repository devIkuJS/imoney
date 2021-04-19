
<style>
   
    .form-label{
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        font-size:40px;
    }
    .form-label2{
        color: black;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        font-size:40px;
        text-align:center !important;
    }
    .card-deck-wrapper2{
        margin-top:35px;
    }
    
    .card{
        background-color: transparent !important ;
    }
    .card-title{
        text-align:center;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        margin-top:15px;
        text-transform:uppercase;
        
    }
    .card-title1{
        text-align:center;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        margin-top:18px;
        text-transform:uppercase;     
    }

    .card-title4{
        text-align:center;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        margin-top:20px;  
        text-transform:uppercase;   
    }
    .card-title5{
        text-align:center;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        margin-top:5px;  
        text-transform:uppercase;   
    }
    .card-title6{
        text-align:center;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold; 
        margin-top:21px;
        text-transform:uppercase;
        
    }
    .card{
     /*    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12); */
        background-color: transparent;
    }
    .card:hover{
      /*  transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06); */
    }
    
</style>

@extends('layouts.app')

@section('content')
<div class="container py-4">
        <div class="form-group row">
            <div class="text-center">
                <div class="col-md-12 mx-auto">
                        <div class="form-check">                             
                                <label class="form-label">
                                Hola</label> <label class="form-label2"> {{ Auth::user()->name }}, </label>
                                <label class="form-label">!BIENVENIDO! elige la operación  que quieres realizar</label>              
                        </div>
                </div>                                             
            </div>
        </div> 
    <div class="row">
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('tipoCambio') }}">
                            <img class="card-img-top" src={{asset('imagenes/TIPO_DE_CAMBIO.png')}} alt="Card image" style="width:68%">
                                <h4 class="card-title1">Tipo de Cambio</h4> 
                            </a>
                        </div>
                    </div>
                    
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('inversionista') }}">
                            <img class="card-img-top" src={{asset('imagenes/INVERSIONISTA.png')}} alt="Card image" style="width:95%">
                                <h4 class="card-title">Inversión</h4>                        
                            </a>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('financiamiento') }}">
                            <img class="card-img-top" src={{asset('imagenes/FINANCIAMIENTO.png')}} alt="Card image" style="width:57%">
                                <h4 class="card-title">Financiamiento</h4>                            
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
                            <img class="card-img-top" src={{asset('imagenes/MIS_DATOS.png')}} alt="Card image" style="width:50%">
                                <h4 class="card-title4">Mis Datos</h4>
                            
                            </a>
                        </div>
                    </div>

                    
                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('cuentaBancaria') }}">
                            <img class="card-img-top" src={{asset('imagenes/CUENTAS_BANCARIAS2.png')}} alt="Card image" style="width:55%">
                                <h4 class="card-title5">Cuentas Bancarias</h4>
                                
                            </a>
                        </div>
                    </div>

                    <div class="card p-2">
                        <div class="text-center">
                            <a class="card-block stretched-link text-decoration-none" href="{{ route('estadoCuenta') }}">
                            <img class="card-img-top" src={{asset('imagenes/ESTADOS_CUENTA.png')}} alt="Card image" style="width:105%">
                                <h4 class="card-title6">Estado de Cuenta</h4>  
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>    
</div>
@endsection

