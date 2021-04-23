@extends('layouts.app')

@section('content')

<style type="text/css">
			.row { 
                margin: 10px 0; 
                }
			.row div[class*='col'] { 
                padding: 5px; 
                text-align: center; 
                border: none;
                }
               .card-header{
                text-align: left;  
               } 
		</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">           
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{URL::to('inversionista/')}}">
                                    <img src={{asset('imagenes/inversionista.png')}} alt="Fjords" style="width:80%">
                                        <div class="caption">
                                            <p>INVERSIONISTAS</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="{{URL::to('financiamiento/')}}">
                                    <img src={{asset('imagenes/financiamiento.jpg')}} alt="Fjords" style="width:80%">
                                    <div class="caption">
                                        <p>FINANCIAMIENTO</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="{{URL::to('cambioTipo/')}}">
                                    <img src={{asset('imagenes/tipo-de-cambio.jpg')}} alt="Fjords" style="width:80%">
                                    <div class="caption">
                                        <p>TIPO DE CAMBIO</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>       


                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{URL::to('misDatos/')}}">
                                        <img src={{asset('imagenes/mis_datos.png')}} alt="Fjords" style="width:80%">
                                        <div class="caption">
                                            <p>Mis datos</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{URL::to('cuentaBancaria/')}}">
                                        <img src={{asset('imagenes/cuenta_bancaria.jpg')}} alt="Fjords" style="width:80%">
                                        <div class="caption">
                                            <p>Cuentas Bancarias</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="{{URL::to('estadoCuenta/')}}">
                                        <img src={{asset('imagenes/estado_cuenta.jpg')}} alt="Fjords" style="width:80%">
                                        <div class="caption">
                                            <p>Estado de Cuenta</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>       
                                                                                     
                        
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
