<style>

.container{
        margin-top: -11px !important;
       
    }
   

    .card-header {
        background: #0274be !important;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
        text-align:center;
    }

    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);  
    }

    .col-form-label{
        color:gray ;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
    }

    .btn-primary1 {
        background-color: #C0BEBF !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        margin-top: 25px;
        border-radius: 50px !important;
        width: 211px;
        
    }

    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background: #0274be !important;
        margin-top: 25px;
        border-radius: 50px !important;
        width: 211px;
    }

    .btn-primary3 {
        background-color: #0274be !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        
    }
    .btn-primary4 {
        background-color: #0274be !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        
    }

    .btn-primary10 {
        background-color: #0274be !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        margin-bottom:100px;
        
    }
   
    .form-check-label2 {
        color: black !important;
        font-weight: bold !important;
        color: #004976 !important; 
        font-size:11px; 
        line-height: 12px;
        font-weight: 600;
    }
    .card{
        margin-bottom:50px;
        border-radius: 40px !important;
    }
    
    h4{
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        color: #2375f0 !important;
        margin-bottom:30px !important;
        font-size: 14px;
        text-align: center;
    }

    p{
        color: #0274be !important;
        font-size:20px;  
    }
    .selecciona-Banco{
        color: #004976 !important;
        font-size: 17px; 
        font-weight: normal;
        line-height: 1.29;
        text-align: center;  
        margin: auto;  
        margin-bottom: 16px;
        width: 398px;
    }

    .selecciona-Cuenta{
        color: #004976 !important;
        font-size: 17px;
        font-weight: normal; 
        line-height: 1.29;
        text-align: center;
        
    }

    select{
        margin-bottom:30px !important;
        color: #22abf1 !important;
        border-radius: 10px !important;
        font-size: 21px !important;
        height: 37px !important; 
        border-color: #5a5a5a !important;
        width: 350px !important;
        border:none !important;
        margin-right: auto !important;
        margin-left: auto !important;
    }
    
    
         
</style>
@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tu cambio para hoy es') }}</div>

                <div class="card-body pb-0">
                    
                    <form method="POST" action="{{ route('operacion.create') }}">
                        @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group d-flex">
                                        <div class="col-md-4 col-xs-5">
                                            <p class="text-ttleft14">ENVÍAS</p>
                                            <p class="text-rectangl15 mrg-0px" id="envias"><p class="text-rectangl15 mrg-0px">PEN 0.0</p></p>
                                        </div>
                                        <div class="col-md-1 col-xs-1 dis-fle">
                                            <img alt="" src="imagenes/flecha-derecha.png">
                                        </div>
                                        <div class="col-md-4 col-xs-6 col-resp6">
                                            <p class="text-ttleft14">RECIBES</p>
                                            <p class="text-rectangl15 mrg-0px" id="recibes"><p class="text-rectangl15 mrg-0px">USD 0.00</p></p>
                                        </div>
                                        <div class="col-md-3 col-xs-12  pdg-resp1">
                                            <p class="text-ttleft14" style="color: #22abf1 !important;">TIPO DE CAMBIO</p>
                                            <p class="text-rectangl15 mrg-0px" id="tipoCambio"><p class="text-rectangl15 mrg-0px">3.639</p></p>
                                        </div>
                            </div>
                        </div>
                    </div> 

                        <div class="container-hijo1">
                            <div class="row">
                                    <div class="col">
                                        <h4>¿DESDE QUÉ BANCO ENVÍAS TU DINERO?</h4>
                                        <p class="selecciona-Banco">Selecciona el banco de donde transferirás el dinero para tu cambio.</p>
                                            
                                        <select class="form-control" id="bancos" name="bancos">
                                            <option value="">Seleccione el banco</option>
                                            @foreach ($bancos as $banco)
                                            <option value="{{$banco->id}}">{{$banco->name}}</option>
                                            @endforeach
                                        </select>
                                            
                                            <div class="form-check">
                                                    <input type="checkbox" name="declaro" class="form-check-input" id="accept" >
                                                    
                                                    <label class="form-check-label2" for="accept">Declaro que transfireré los fondos a Imoney desde una cuenta bancaria de pruebaAlex 
                                                    de la cual soy titular o con autorización del representante legal.</label>
                                                       
                                            </div>
                                                @if ($errors->has('declaro'))
                                                <span
                                                    class="text-danger d-block">{{ $errors->first('declaro') }}</span>
                                                @endif
                                    </div>
                                    <div class="col">
                                        <h4>¿EN QUÉ CUENTA DESEAS RECIBIR TU DINERO?</h4>
                                        <p class="selecciona-Cuenta">Selecciona la cuenta en donde deseas recibir tu cambio, puede
                                        ser propia o de terceros.</p>
                                        <a id="seleccionar-cuenta" class="dis-itmcent text-selectCount color-btnsky">
                                                <button type="button" class="btn btn-primary3" data-toggle="modal" data-target="#exampleModal"><i class="far fa-address-card"></i>&nbsp;SELECCIONAR CUENTA
                                                </button>
                                        </a>
                                        
                                        
                                            <a id="agregar-cuenta" class="dis-itmcent text-selectCount color-btnsky">
                                                <button type="button" class="btn btn-primary4" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i>&nbsp;AGREGAR NUEVA CUENTA
                                                </button>
                                            </a>
                                               <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA CUENTA</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                        <form action="{{ route('cuentaBancaria.create') }}" method="post" >
                                                        @csrf
                                                            <select class="form-control" name="cuenta_bancarias">
                                                                <option value="">Seleccionar</option>
                                                                <option value="">BCP</option>
                                                                <option value="">BBVA</option>
                                                                <option value="">SCOTIABANK</option>
                                                                <option value="">Banco Pichincha</option>
                                                                <option value="">Banco Interbank</option>
                                                                <option value="">Banco de la Nación</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="validationCustomUsername">Número de Cuenta</label>
                                                            <div class="col-md-10">
                                                                <input id="numero_cuenta" type="text"
                                                                    class="form-control @error('numero_cuenta') is-invalid @enderror"
                                                                    name="numero_cuenta" value="{{ old('numero_cuenta') }}" required
                                                                    autocomplete="numero_cuenta" autofocus>

                                                                @if ($errors->has('numero_cuenta'))
                                                                <span class="text-danger">{{ $errors->first('numero_cuenta') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary10">Agregar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                    </div>
                            </div>       
                        </div> 

                                        <div class="text-center">
                                            <a class="btn btn-primary1" onclick="stepper1.previous()">Regresar</a>
                                            <a class="btn btn-primary" onclick="stepper1.next()">Procesar</a>
                                        </div>     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection


    @section('custom-script')
    
@stop