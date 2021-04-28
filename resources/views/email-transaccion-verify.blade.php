<style>
    .text-lightblue{
        color: #0274be !important;
        font-size: 1.5rem;
        font-weight: bold;
    }
    
</style>
@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-white text-lightblue" style="border:none !important;">{{ __('Transaccion confirmada!') }}</div>

                <div class="card-body text-center pt-0">
                    <img src="{{asset('imagenes/send_mail.png')}}" alt="send-mail" class="img-fluid" style="width: 200px;"/>
                    <p class="font-weight-bold">{{ __('Tu transacción fue confirmada por favor verifica tu correo electronico') }}</p>
                    <p class="font-weight-bold">Si deseas regresar al panel principal por favor , selecciona <a href="{{ route('user') }}">aqui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<main>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-white text-lightblue" style="border:none !important;">{{ __('Transacción confirmada!') }}</div>
    
                    <div class="card-body text-center pt-0">
                        <img src="{{asset('imagenes/send_mail.png')}}" alt="send-mail" class="img-fluid" style="width: 200px;"/>
                        <p class="font-weight-bold h5">Tu transacción con <strong style="color:#3233c1 !important;">Nro orden: {{$nroTransaccion}}</strong> fue confirmada por favor verifica tu correo electronico</p>
                        <p class="font-weight-bold h5" style="color:gray;">Si deseas regresar al panel principal, por favor, selecciona <a href="{{ route('user') }}">aqui</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</main>
@endsection
