@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('perfil') }}">
                        @csrf

                        <div class="form-group row">
                                    <h1 class="text-center"><b>¿Con qué perfil deseas operarA? </b></h1>
                                <div class="text-center">
                                    <a href="registrapersona2" class="imagen1"><img src="imagenes/persona100.png"></a>
                                    <a href="{{URL::to('register/')}}"><img src={{asset('imagenes/persona100.png')}} alt="Logo"></a>
                                    <label class="text-center" style="padding-left: 0.8rem !important;"><a class="btn btn-link pl-1 pt-1" href="{{ route('register') }}">
                                    {{ __('Persona Natural') }}
                                </div> 
                                <div class="text-center">
                                    <a href="registraempresa2" class="imagen2"><img src="imagenes/empresa300.png"></a>
                                    <a href="{{URL::to('registerEmpresa/')}}"><img src={{asset('imagenes/empresa300.png')}} alt="Logo"></a>
                                    <label class="text-center" style="padding-left: 0.8rem !important;"><a class="btn btn-link pl-1 pt-1" href="{{ route('registerEmpresa') }}">
                                    {{ __('Empresa') }}
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
