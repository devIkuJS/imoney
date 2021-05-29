<style>
    .card-header{
        margin-top:55px;
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

    /*@media (max-width: 575.98px) {
        .col-form-label{
        font-size:30px !important;
        }
    }

    @media (max-width: 767.98px) {
        .col-form-label{
        font-size:20px !important;
        }
    }

    @media (max-width: 991.98px) {
        .col-form-label{
        font-size:20px !important;
        }
    }*/
    @media (max-width: 1199.98px) {
        .col-form-label {
            font-size:14px !important;
        }
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white h4" style="background: transparent !important;border-style: none;">
                <div class="card-header text-white font-weight-bold" style="background: transparent !important;border-style: none;">{{ __('Cambiar contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Correo electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
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
