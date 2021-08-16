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
    /*.font-weight-bold{
        color:white !important;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        margin-top:10px !important;
    }*/
    .h5{
        color: black !important;
    }
    .leido{
        color: black !important;
    }
    .form-control{
        border-radius: 8px !important;
    }
    .text-black{
        color: black !important;
    }
    .btn-enviar-financiamiento{
        background: black !important;
        border-radius: 3rem !important;
        font-size: 1.2rem !important;
        font-weight: bold !important;
        padding: 10px 20px !important;
        border: transparent !important;
    }
    .div-border{
        border: 2px solid #fff;
        border-radius: 10px;
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
                <!--<div class="card" style="background: transparent !important;border-style: none;">
                    <div class="card-header mt-0" style="background: transparent !important;border-style: none;">
                        <span class="font-weight-bold text-white h2 text-center">Hola, Guti </span>            
                        <h5 class="text-center font-weight-bold text-black">IMONEY Soluciones financieras para empresa</h5>
                    </div>-->
                    <div class="col-md-12 text-center">
                            <span class="font-weight-bold text-white h2">Hola, </span><span id="hi2"
                            class="font-weight-bold text-white h1"></span>
                             <h4 class="font-weight-bold">IMONEY Soluciones financieras para empresa</h4>   
                    </div>
                        <form action="{{ route('financiamientoEmpresa.create') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}          
                            <div class="card-body mx-auto mt-2">
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label class="font-weight-bold">Escoge el tipo de financiamiento que necesitas:</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label class="text-white font-weight-bold">Adjúntanos estos documentos:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="factura" class="font-weight-bold">Factoring & Confirming Financiamiento a la Importación</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label for="factura" class="text-white font-weight-bold">PDF de tu Factura / Letra / Orden compra</label>
                                            <input type="file" class="form-control" name="factura" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="copia_literal" class="font-weight-bold">Préstamo con garantía inmobiliaria</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label for="copia_literal" class="text-white font-weight-bold">PDF de copia literal inmueble a poner en garantia</label>
                                            <input type="file" class="form-control" name="copia_literal" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="cotizacion" class="font-weight-bold">Leasing o Arrendamiento</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label for="cotizacion" class="text-white font-weight-bold">PDF Ficha RUC / Cotización de bien a adquirir</label>
                                            <input type="file" class="form-control" name="cotizacion" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="ficha_cliente" class="font-weight-bold">Financiamiento a mis clientes</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label for="ficha_cliente" class="text-white font-weight-bold">PDF Ficha RUC</label>
                                            <input type="file" class="form-control" name="ficha_cliente" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="ficha_inmobiliario" class="font-weight-bold">Financiamiento Inmobiliario</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label for="ficha_inmobiliario" class="text-white font-weight-bold">PDF Ficha RUC</label> 
                                            <input type="file" class="form-control" name="ficha_inmobiliario" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="text-left mt-4">
                                            <p class="font-weight-bold text-white">
                                                La información facilitará será evaluar la solvencia patrimonial de las empresas y personas
                                                involucradas y prevenir cualquier situación de fraude y gestionar la relación contractual
                                                con IMONEY PERÚ SAC, estos datos podrán ser compartidos de manera confidencial con nuestra cartera 
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
                                            <label class="form-check-label2 font-weight-bold leido" for="accept">He leído y acepto el aviso de privacidad sobre los servicios y promociones de Imoney.</label>          
                                        </div>
                                        @if ($errors->has('terminos'))
                                            <span class="text-danger">{{ $errors->first('terminos') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary btn-enviar-financiamiento" id="btn-enviar-financiamiento">ENVIAR</button>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="text-center mt-4">
                                            <p class="row py-2 div-border col-md-6 mx-auto font-weight-bold text-white">
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
</main>
@endsection

@section('custom-script')
<script>

$(document).ready(function() {
    $.ajax({
        url: `/inversionista/razonSocial`,
        success: function(respuesta) {
            console.log(respuesta);
            $("#hi2").html(respuesta);
        },
        error: function() {
            console.log("No se ha podido obtener la informacion");
        }
    });
});
</script>
@endsection