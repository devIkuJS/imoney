<style>
    .container{
        margin-top:55px !important;
    }
    .btn-primary{
        background: black !important;
    }
    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);  
    }
    .col-form-label{
        font-size:20px !important;
    }
    .invalid-feedback{
        color: #8f0000;
        font-size: 16px !important;
    }
    
    .confirmacion{
        font-size:17px;
        color:green;
        font-weight:bold;
    }
    .negacion{
        font-size:17px;
        color:red;
        font-weight:bold;
    }
    span{
        margin:30px 0 10px;
        display:block;
    }
    /*.alert{
        margin-top:-340px !important;
    }*/
    @media (max-width: 575.98px) {
        .h3 {
            font-size:19px !important;
        }
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white h3" style="background: transparent !important;border-style: none;">
                <div class="card-header text-white font-weight-bold" style="background: transparent !important;border-style: none;">{{ __('Restablecer Contraseña') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Nueva contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>  
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="restablecer" data-type="success mx-auto w-25 bg-success text-white text-center h6" data-message="Registro exitoso">
                                    {{ __('Restablecer Contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

$(document).ready(function() {
	//variables
	var password = $('[name=password]');
	var password_confirmation = $('[name=password_confirmation]');
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 8-10 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(password_confirmation);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = password.val();
	var valor2 = password_confirmation.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor1.length==0 || valor1==""){
	span.text(vacio).addClass('negacion');	
	}
	if(valor1.length<8 || valor1.length>10){
	span.text(longitud).addClass('negacion');
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	}
	}
	//ejecuto la función al soltar la tecla
	password_confirmation.keyup(function(){
	coincidePassword();
	});
});
function showAlert(type, message, duration) {
    if (!message) return false;
    if (!type) type = 'info';
    $("<div class='alert alert-message alert-" +
        type +
        " data-alert alert-dismissible'>" +
        "<button class='close alert-link' data-dismiss='alert'>&times;</button>" +
        message + " </div>").hide().appendTo('body').fadeIn(300);
    if (duration === undefined) {
        duration = 5000;
    }
    if (duration !== false) {
        $(".alert-message").delay(duration).fadeOut(500, function() {
            $(this).remove();
        });
    }
}


// ...or trigger it using a button
$('.btn').on("click", function() {
    var type = $(this).data('type');
    var message = $(this).data('message');
    var duration = $(this).data('duration');
    showAlert(type, message, duration);
});
</script>


@endsection