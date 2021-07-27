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
                <div class="card" style="background: transparent !important;border-style: none;">
                    <div class="card-header" style="background: transparent !important;border-style: none;">
                                <h5 class="text-center font-weight-bold">{{ __('Escoge IMONEY como medio de pago y compra en cuotas comercios aliados. Compra y disfruta hoy y paga después') }}</h5>
                    </div>
                        <form action="{{ route('financiamientoPersonaNatural.create') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}  
                            <div class="card-body mx-auto">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="descripcion" class="text-white font-weight-bold">Que quieres comprar</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Describe el producto o servicio adquirir">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="establecimiento" class="text-white font-weight-bold">Nombre el establecimiento</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="establecimiento" id="establecimiento" placeholder="Bike huse">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="servicio" class="text-white font-weight-bold">Nombre del bien servicio</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="servicio" id="servicio" placeholder="Bicicleta">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="numero_cuota" class="text-white font-weight-bold">Número de cuotas</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="numero_cuota" id="numero_cuota" placeholder="Máximo hasta 12 meses">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="foto_perfil" class="text-white font-weight-bold">Confirme tu identidad</label>                                  
                                    </div>
                                    <div class="col-6">
                                        <label class="text-white font-weight-bold">Tomate una foto por tu whatsapp</label> 
                                        <input type="file" class="form-control" name="foto_perfil"
                                                accept="image/jpeg,image/png,image/x-eps">
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
                                    <button type="submit" class="btn btn-secondary" id="btn-enviar-financiamiento">ENVIAR</button>
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
    </div>
</main>
@endsection

