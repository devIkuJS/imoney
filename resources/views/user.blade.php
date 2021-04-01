<style>
  .custom-file-label::after {
    content: "Adjuntar" !important;
  }

  .custom-file {
    overflow: hidden;
  }

  .custom-file-input {
    white-space: nowrap;
  }
</style>
@extends('layouts.app')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <!--  <a class="nav-link" href="#">Cerrar Sesion</a> -->
        <form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" name="logout-form" id="logout-form"
          class="pt-2">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-link nav-link">Cerrar Sesion</button>
        </form>
      </li>
    </ul>

  </div>
</nav>



@section('content')
@if($status_bancario === '1')

<div>
  <div class="card shadow p-3 mb-5 bg-white rounded mx-auto" style="width: 18rem;">
    <img class="card-img-top" src="#" alt="Card image cap">
    <div class="card-body">
      <p class="card-text">Inversionistas</p>
    </div>
  </div>

  <div class="card shadow p-3 mb-5 bg-white rounded mx-auto" style="width: 18rem;">
    <img class="card-img-top" src="#" alt="Card image cap">
    <div class="card-body">
      <p class="card-text">Financiamiento</p>
    </div>
  </div>
</div>

@else

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Registro de cuenta bancaria') }}</div>
        <div class="card-body pb-0">
          <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlSelect1">Seleccione el banco</label>
              <select class="form-control" name="bancos">
                <option value="">Seleccione el banco</option>
                @foreach ($bancos as $banco)
                <option value="{{$banco->id}}">{{$banco->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tipo de cuenta</label>
              <select class="form-control" name="tipo_cuentas">
                <option value="">Seleccione Tipo de cuenta</option>
                @foreach ($tipo_cuentas as $tipo_cuenta)
                <option value="{{$tipo_cuenta->id}}">{{$tipo_cuenta->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="validationCustomUsername">Ingrese su cuenta en soles</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                </div>
                <input type="text" class="form-control" name="cuenta_soles" id="validationCustomUsername"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="validationCustomUsername">Ingrese su cuenta en dolares</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">$</span>
                </div>
                <input type="text" class="form-control" name="cuenta_dolares" id="validationCustomUsername"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>


            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="accept">Registrándote, aceptas <a href="#" target="_blank">Términos y
                  Condiciones</a> / <a href="#" target="_blank">Políticas de privacidad y uso de Datos</a>.</label>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endif

@endsection