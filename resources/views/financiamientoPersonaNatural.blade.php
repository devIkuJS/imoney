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
    .h5{
        color: black !important;
    }
    .leido{
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
    /*.font-weight-bold{
        
        font-family: Helvetica, sans-serif;
        margin-top:10px !important;
    }*/
    .form-control{
        border-radius: 8px !important;
    }
    
    @media (max-width: 575.98px) {
        .text-center {
            font-size:17px;
        }
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
            <div class="col-md-9">                
                <!--<div class="card" style="background: transparent !important;border-style: none;">
                    <div class="card-header" style="background: transparent !important;border-style: none;">
                        <span class="font-weight-bold text-white h2">Hola, </span><span id="hi2"
                            class="font-weight-bold text-white h1"></span>
                        <h5 class="font-weight-bold text-center text-black h5">Con IMONEY compra hoy y paga en cómodas cuotas en nuestros comerciales aliados.</h5>
                    </div>-->
                    <div class="col-md-12 text-center">
                            <span class="font-weight-bold text-white h2">Hola, </span><span id="hi2"
                            class="font-weight-bold text-white h1"></span>
                             <h4 class="font-weight-bold">Con IMONEY compra hoy y paga en cómodas cuotas en nuestros comerciales aliados.</h4>   
                    </div>
                        <form action="{{ route('financiamientoPersonaNatural.create') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}  
                            <div class="card-body mx-auto">
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="descripcion" class="font-weight-bold">Que quieres comprar</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <input id="descripcion" type="text" 
                                                class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" 
                                                value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus 
                                                placeholder="Describe el producto o servicio adquirir">
                                            
                                            @if ($errors->has('descripcion'))
                                            <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                            @endif                                   
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="establecimiento" class="font-weight-bold">Nombre del establecimiento</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <input id="establecimiento" type="text" 
                                                class="form-control @error('establecimiento') is-invalid @enderror" name="establecimiento" 
                                                value="{{ old('establecimiento') }}" required autocomplete="establecimiento" autofocus 
                                                placeholder="Bike huse">

                                            @if ($errors->has('establecimiento'))
                                            <span class="text-danger">{{ $errors->first('establecimiento') }}</span>
                                            @endif    
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="servicio" class="font-weight-bold">Nombre del bien servicio</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <input id="servicio" type="text" 
                                                class="form-control @error('servicio') is-invalid @enderror" name="servicio" 
                                                value="{{ old('servicio') }}" required autocomplete="servicio" autofocus
                                                placeholder="Bicicleta">
                                            
                                            @if ($errors->has('servicio'))
                                            <span class="text-danger">{{ $errors->first('servicio') }}</span>
                                            @endif       
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="monto_total" class="font-weight-bold">Monto total a financiar</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <input id="monto_total" type="text" 
                                                class="form-control @error('monto_total') is-invalid @enderror" name="monto_total" 
                                                value="{{ old('monto_total') }}" required autocomplete="monto_total" autofocus
                                                placeholder="Monto total">
                                            
                                            @if ($errors->has('monto_total'))
                                            <span class="text-danger">{{ $errors->first('monto_total') }}</span>
                                            @endif       
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="numero_cuota" class="font-weight-bold">Número de cuotas</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <input id="numero_cuota" type="text" 
                                                class="form-control @error('numero_cuota') is-invalid @enderror" name="numero_cuota"
                                                value="{{ old('numero_cuota') }}" required autocomplete="numero_cuota" autofocus
                                                placeholder="Máximo hasta 12 meses">

                                            @if ($errors->has('numero_cuota'))
                                            <span class="text-danger">{{ $errors->first('numero_cuota') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <label for="foto_perfil" class="font-weight-bold">Confirme tu identidad</label>                                  
                                        </div>
                                        <div class="col-6">
                                            <label class="font-weight-bold">Tomate una foto por tu whatsapp</label> 
                                            <input id="foto_perfil" type="file" 
                                                class="form-control" name="foto_perfil"
                                                accept="image/jpeg,image/png,image/x-eps">

                                            @if ($errors->has('foto_perfil'))
                                            <span class="text-danger d-block">{{ $errors->first('foto_perfil') }}</span>   
                                            @endif
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
                                            <label class="form-check-label2 font-weight-bold leido" for="accept">He leído y acepto el aviso de privacidad sobre los servicios y promociones de IMONEY.</label>                                             
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