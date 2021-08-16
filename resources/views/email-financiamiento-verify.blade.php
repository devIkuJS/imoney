<style>
    .text-lightblue{
        color: #0274be !important;
        font-size: 1.5rem;
        font-weight: bold;
    }
    
</style>
@extends('layouts.app')
@section('content')

<main>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: transparent !important;border-style: none;">
                    <div class="card-header text-center bg-white text-white font-weight-bold h2" style="background: transparent !important;border-style: none;">¡FELICIDADES!</div>
                        <div class="card-body text-center pt-0">
                            <img src="{{asset('imagenes/CORREO2.png')}}" alt="send-mail" class="img-fluid" style="width: 200px;"/>
                            <p class="font-weight-bold text-white h5 mt-5">Hemos recibido la informacion respecto a tu solicitud de financiamiento en el corto plazo nuestro equipo estará
                                en comunicacion directa para conocer más detalles de tu solicitud.</p>
                            <p class="font-weight-bold text-black h5">Si deseas regresar al panel principal, por favor, selecciona <a href="{{ route('user') }}" style="color:white !important;">aqui</a></p>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row text-left py-4 div-border">
                                        <div class="col-19">
                                            <h5 class="font-weight-bold">Atentamente</h5>
                                            <h5 class="font-weight-bold">IMONEY PERU SAC</h5>
                                            <h5 class="font-weight-bold">RUC: 20602075665</h5>
                                            <h5 class="font-weight-bold">TEL(01) 748-2710</h5>
                                        </div>   
                                    </div>
                                </div>  
                            </div>    
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
