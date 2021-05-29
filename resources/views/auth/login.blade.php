<style>

    .container{
        margin-top: 55px !important;
    }
    .card-header{
        /*background:#0274be !important;*/
        color:white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 14px;
    }
    .img-fluid{
        margin:5px;
        margin-top: 0px;
        margin-left:-10px;
        margin-right:10px;
    }
    .form-control{
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }

    .col-form-label{
        color:white ;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
    }
    .btn-primary{
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background:black!important;

    }

    .btn-link{
        color:white !important ;
    }
    .btn-link-aqui{
        color:white !important ;
    }
    .una-cuenta{
        color:black !important ;
    }
   
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: transparent !important;border-style: none;">
                <div class="card-header" style="background: transparent !important;border-style: none;">
                    
                    <img src={{asset('imagenes/logo_alex.png')}} alt="Fjords" style="width:9%;margin-right:7px !important;" class="img-fluid"><label class="col-form-label-iniciar h4 font-weight-bold" style="margin-left:20px;">{{ __('INICIAR SESIÓN') }}</label></div>
                <div class="card-body pb-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" value="recordarme" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input id="show_password" class="form-check-input" type="checkbox" name="showpassword" id="showpassword" {{ old('showpassword') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="showpassword">
                                        {{ __('Mostrar contraseña') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="recordarme()">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-8 offset-md-4 pl-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4 pl-0">
                                <label class="una-cuenta" style="padding-left: 0.8rem !important;">¿No tiene una cuenta? <a class="btn btn-link-aqui pl-1 pt-1" href="{{ route('tipoRegistro') }}">
                                    {{ __('Crea una aqui') }}
                                </a></label>    
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
        $('#show_password').on('change',function(event){
    // Si el checkbox esta "checkeado"
    if($('#show_password').is(':checked')){
        // Convertimos el input de contraseña a texto.
        $('#password').get(0).type='text';
    // En caso contrario..
    } else {
        // Lo convertimos a contraseña.
        $('#password').get(0).type='password';
    }
    });
    const rmCheck = document.getElementById("remember"),
    emailInput = document.getElementById("email");

    if (localStorage.checkbox && localStorage.checkbox !== "") {
    rmCheck.setAttribute("checked", "checked");
    emailInput.value = localStorage.username;
    } else {
    rmCheck.removeAttribute("checked");
    emailInput.value = "";
    }

    function recordarme() {
    if (rmCheck.checked && emailInput.value !== "") {
        localStorage.username = emailInput.value;
        localStorage.checkbox = rmCheck.value;
    } else {
        localStorage.username = "";
        localStorage.checkbox = "";
    }
    }
    </script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
@stop

