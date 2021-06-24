<style>
    main{
            margin-top: 25px !important;     
    }
    
   
    .card-header {
        background: #0274be !important;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
    }
    
    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%); 
    }
    
    .col-form-label{
        /*color:#22abf1 ; */
        color: #FFFFFF;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        
    }
    .card {
        background: transparent !important;
        border: none !important;
    }
    
    /*.disabled{
        opacity:0,2:
    }*/
    input{
        background:#FAFAFA !important;   
    } 

   
    input:focus, input.form-control:focus {
        outline:none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }
    .btn-primary1 {
        background-color: #C0BEBF !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }
    .btn-primary2 {
        background-color: black !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }
    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background: #0274be !important;
    }
    h5{
       /* color:#2375f0; */
       font-family: Helvetica, sans-serif !important;
    }
    h3{
        color:#2375F0;
    }
    .btn-cambiar-contraseña {
        background: black !important;
        border-radius: 3rem !important;
        font-size: 1.2rem !important;
        font-weight: bold !important;
        padding: 12px 25px !important;
    }
    :checked {
        background: black !important;
    }
    .confirmacion{
        font-size:16px;
        color:green;
        font-weight:bold;
    }
    .negacion{
        font-size:16px;
        color:red;
        font-weight:bold;
    }
         
</style>
@extends('layouts.app')
@section('content')
<main>
    <div class="container">           
        <div class="row">        
            <div class="col-md-8 mx-auto">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="text-left mt-5">
                            <div class="text-center">
                                <h3 class="text-white font-weight-bold">Mis Datos</h3>
                            </div>
                                <p class="font-weight-bold"><img src={{asset('icon-calculator/masinfo.svg')}}
                                   class="mr-2 mb-1" alt="icon-ayuda">
                                        En Imoney nos preocupamos por la seguridad de tu información 
                                        y la protegemos a través de un protocolo de seguridad que 
                                        garantiza la privacidad de tus datos.
                                </p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('misDatos.actualizar', $user->id) }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name"
                                class="col-form-label">{{ __('Nombres') }}</label>      
                            <input id="name" type="text"
                                class="form-control  @error('name') is-invalid @enderror" name="name"
                                value="{{$user->name}}" required autocomplete="name" autofocus disabled >    
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif                 
                        </div>          
                        <div class="col-md-6">
                            <label for="apellidos" 
                                class="col-form-label">{{ __('Apellidos') }}</label>                                                                   
                            <input id="apellidos" type="text"
                                class="form-control  @error('apellidos') is-invalid @enderror"
                                name="apellidos" value="{{$user->apellidos}}" required
                                autocomplete="apellidos" autofocus disabled>                      
                                    @if ($errors->has('apellidos'))
                                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                    @endif                        
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="dni"
                                class="col-form-label">{{ __('Nro. de documento') }}</label> 
                            <input id="dni" type="text"
                                class="form-control @error('dni') is-invalid @enderror"
                                name="dni" value="{{$user->dni}}" required autocomplete="dni"
                                autofocus disabled>
                                    @if ($errors->has('dni'))
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                    @endif                                            
                        </div> 
                        <div class="col-md-6">
                            <label for="email"
                                class="col-form-label">{{ __('Correo') }}</label>
                            <input id="email" type="email"
                                class="form-control  @error('email') is-invalid @enderror"
                                name="email" value="{{$user->email}}" required
                                autocomplete="email" autofocus disabled>                
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="domicilio"
                                class="col-form-label">{{ __('Domicilio') }}</label>
                            <input id="domicilio" type="text"
                                class="form-control @error('domicilio') is-invalid @enderror"
                                name="domicilio" value="{{$user->domicilio}}" required
                                autocomplete="domicilio" autofocus style="background:white !important;">                 
                                    @if ($errors->has('domicilio'))
                                    <span class="text-danger">{{ $errors->first('domicilio') }}</span>
                                    @endif                            
                        </div> 
                        <div class="col-md-6">
                            <label for="celular"
                                class="col-form-label">{{ __('Celular') }}</label>                    
                            <input id="celular" type="text"
                                class="form-control @error('celular') is-invalid @enderror"
                                name="celular" value="{{$user->celular}}" required
                                autocomplete="celular" autofocus style="background:white !important;">
                                    @if ($errors->has('celular'))
                                    <span class="text-danger">{{ $errors->first('celular') }}</span>
                                    @endif
                        </div>             
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="ocupacion"
                                class="col-form-label">{{ __('Ocupación') }}</label>
                            <input id="ocupacion" type="text"
                                class="form-control  @error('ocupacion') is-invalid @enderror"
                                name="ocupacion" value="{{$user->ocupacion}}" required
                                autocomplete="ocupacion" autofocus style="background:white !important;">
                                    @if ($errors->has('ocupacion'))
                                    <span class="text-danger">{{ $errors->first('ocupacion') }}</span>
                                    @endif
                        </div>             
                        <div class="col-md-6">
                            <label for="nacionalidad"
                                class="col-form-label">{{ __('Nacionalidad') }}</label>
                            <input id="nacionalidad" type="text"
                                class="form-control  @error('nacionalidad') is-invalid @enderror"
                                name="nacionalidad" value="{{$user->nacionalidad}}" required
                                autocomplete="nacionalidad" autofocus disabled>   
                                    @if ($errors->has('nacionalidad'))
                                    <span class="text-danger">{{ $errors->first('nacionalidad') }}</span>
                                    @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="politico"
                                    class="col-form-label">{{ __('¿ES UD. UNA PERSONA POLITICAMENTE EXPUESTA?') }}</label>
                                <div class="form-check form-check-inline mt-3">
                                    <label class="form-check-label mr-1 font-weight-bold text-white" for="si">Si</label>
                                    <input class="form-check-input mr-4" type="radio" name="politico" disabled
                                    value="1" {{$user->politico == "1" ? 'checked' : '' }}>
                                    <label class="form-check-label mr-1 font-weight-bold text-white" for="no">No</label>
                                    <input class="form-check-input" type="radio" name="politico" disabled
                                    value="0" {{$user->politico == "0" ? 'checked' : '' }}>
                                </div>
                                @if ($errors->has('politico'))
                                <span
                                    class="text-danger d-block">{{ $errors->first('politico') }}</span>
                                @endif                               
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-primary2 mr-3 text-white" id="actualizar-datos">Actualizar</button>
                        </div>
                    </div>
                </form>
                                               
                <div class="col-md-6">
                    <!-- Button trigger modal -->
                    <!--<button type="button" class="btn btn-primary btn-cambiar-contraseña" data-toggle="modal" 
                            data-target="#modal-cambiar-contrasena">
                            <i class="fa fa-key"></i>&nbsp;Cambiar Contraseña
                    </button>-->
                </div>
                    <div class="text-center col-md-12 mt-4">
                        <a class="btn btn-primary1 btn-regresar mr-3 font-weight-bold text-white" href="{{ route('user') }}">Atrás</a>
                    </div>
            </div>               
        </div>
    </div>
</main>

<!-- Modal actualizar domicilio -->
<!--<div class="modal fade" id="modal-actualizar-domicilio-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title font-weight-bold" id="exampleModalCenterTitle">ACTUALIZAR DOMICILIO</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route ('misDatos.actualizar', $user->id) }}" >
            @csrf
            <div class="form-group row">
                <label for="domicilio"
                      class="col-md-4 col-form-label text-md-right" style="color:#22abf1;">Domiclio</label>
                        <div class="col-md-6">
                                <input id="domicilio" type="text"
                                    class="form-control" name="domicilio" style="background:white !important;">                                  
                        </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>
    </div>
  </div>
</div>-->
<!-- Modal actualizar domicilio -->


<!-- Modal actualizar celular -->
<!--<div class="modal fade" id="modal-actualizar-celular-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title font-weight-bold" id="exampleModalCenterTitle">ACTUALIZAR CELULAR</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route ('misDatos.actualizar', $user->id) }}" >
            @csrf
            <div class="form-group row">
                <label for="celular"
                      class="col-md-4 col-form-label text-md-right" style="color:#22abf1;">Celular</label>
                        <div class="col-md-6">
                                <input id="celular" type="text"
                                    class="form-control" name="celular" style="background:white !important;">               
                        </div>
            </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>
    </div>
  </div>
</div>-->
<!-- Modal actualizar celular -->


<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="modal-cambiar-contrasena" tabindex="-1" role="dialog" aria-labelledby="modal-cambiar-contrasena" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title font-weight-bold" id="modal-cambiar-contrasena">CAMBIAR CONTRASEÑA</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('misDatos.cambiarContrasena', $user->id) }}">
            @csrf 
            <div class="form-group row">
                    <label for="mypassword"
                           class="col-md-4 col-form-label text-md-right" style="color:#22abf1;">{{ __('Contraseña actual') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('mypassword') is-invalid @enderror" 
                               name="mypassword" value="{{ $password ?? old('password') }}" required autocomplete="password" autofocus style="background:white !important;">                                 
                            @error('mypassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
            </div>
            <div class="form-group row">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-right" style="color:#22abf1;">{{ __('Nueva Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="new-password" style="background:white !important;">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                    <label for="mypassword"
                           class="col-md-4 col-form-label text-md-right" style="color:#22abf1;">{{ __('Confirmar contraseña') }}</label>

                    <div class="col-md-6">                        
                        <input id="password-confirm" type="password" 
                               class="form-control" name="password_confirmation" 
                               required autocomplete="new-password" style="background:white !important;">
                    </div>
             </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="cambiar-contrasena">RESTABLECER</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Cambiar Contraseña -->

    @endsection

    @section('custom-script')
    <script type="text/javascript">
    $('#actualizar-datos').click(()=>{
      $.ajax({
          type:"POST",
          url:`misDatos/{{$user->id}}/actualizar`,
          data:{
          domicilio:'{{$user->domicilio}}',
          celular:'{{$user->celular}}',
          ocupacion:'{{$user->ocupacion}}',
          _token:"{{csrf_token()}}"
          },
          success:function(data){
            console.log(data);
            console.log("Datos actualizados");
          },
          error:function(err){
            console.log(err);
          },
      });

    })

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
    
    </script>
  
@stop