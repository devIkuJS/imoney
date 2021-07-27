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
    div.mt-0{
        margin-top: -50px !important;
    }
    div.mt-1{
        margin-top: -40px !important;
    }
    .btn-secondary{
        background: black !important;
    }   
</style>
@extends('layouts.app')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">                
                <div class="card" style="background: transparent !important;border-style: none;">
                    <div class="card-header mt-0" style="background: transparent !important;border-style: none;">
                                <h5 class="text-center font-weight-bold">{{ __('IMONEY PERÚ ESCOGE EL MEJOR TIPO DE FINANCIAMIENTO PARA TU EMPRESA') }}</h5>
                    </div>
                        <form action="{{ route('financiamientoEmpresa.enviarFinanciamiento') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}          
                            <div class="card-body mx-auto mt-1">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="factura" class="text-white font-weight-bold">Factoring & Confirming, Financiamiento a la importación</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <label for="factura" class="text-white font-weight-bold">Factura/Letra/Orden compra</label>
                                        <input type="file" class="form-control" name="factura" accept="application/pdf">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="copia_literal" class="text-white font-weight-bold">Capital de Trabajo</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <label for="copia_literal" class="text-white font-weight-bold">Copia literal inmueble a poner en garantia</label>
                                        <input type="file" class="form-control" name="copia_literal" accept="application/pdf">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="cotizacion" class="text-white font-weight-bold">Leasing o Arrendamiento</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <label for="cotizacion" class="text-white font-weight-bold">Ficha RUC/Cotización de bien a adquirir</label>
                                        <input type="file" class="form-control" name="cotizacion" accept="application/pdf">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="ficha_cliente" class="text-white font-weight-bold">Financiamiento a mis Clientes</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <label for="ficha_cliente" class="text-white font-weight-bold">Ficha RUC</label>
                                        <input type="file" class="form-control" name="ficha_cliente" accept="application/pdf">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="ficha_inmobiliario" class="text-white font-weight-bold">Financiamiento a Inmobiliario</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <label for="ficha_inmobiliario" class="text-white font-weight-bold">Ficha RUC</label> 
                                        <input type="file" class="form-control" name="ficha_inmobiliario" accept="application/pdf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="text-left mt-4">
                                            <p class="font-weight-bold">
                                                La información facilitará será evaluar la solvencia patrimonial de las empresas y personas
                                                involucradas y prevenir cualquier situación de fraude y gestionar la relación contractual
                                                con Imoney Perú Sac, estos datos podrán ser compartidos de manera confidencial con nuestra cartera 
                                                de inversionistas.
                                            </p>        
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" name="terminos" class="form-check-input"
                                                id="accept">
                                            <label class="form-check-label2 text-white" for="accept">He leído y acepto el aviso de privacidad sobre los servicios y promociones de Imoney
                                                .</label>
                                        </div>
                                        @if ($errors->has('terminos'))
                                            <span class="text-danger">{{ $errors->first('terminos') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">ENVIAR</button>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="text-center mt-4">
                                            <p class="border border-danger font-weight-bold">
                                                Gracias por compartimos tu información, por favor.
                                                Verifica tu cuenta a través de tu correo electrónico.
                                            </p>        
                                        </div>
                                    </div>
                                </div>        
                            </div> 
                        </form>                   
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
