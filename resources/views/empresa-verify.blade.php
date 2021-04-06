<style>
    .text-lightblue{
        color: #0274be !important;
        font-size: 1.5rem;
        font-weight: bold;
    }
    
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-white text-lightblue" style="border:none !important;">{{ __('! Tu cuenta en iMoney ha sido creada con éxito !') }}</div>

                <div class="card-body text-center pt-0">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <img src="{{asset('imagenes/send_mail.png')}}" alt="send-mail" class="img-fluid" style="width: 200px;"/>
                    <p class="font-weight-bold">{{ __('Gracias por registrarte en iMoney, antes de poder continuar, por favor, confirma tu correo electrónico con el enlace que te hemos enviado.') }}</p>
                    <p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <span style="color:#85888e; ">{{ __('If you did not receive the email') }},</span>
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
