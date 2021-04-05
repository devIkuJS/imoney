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
      <div class="alert alert-primary text-center" role="alert">
        Muchas gracias por registrarte con nosotros <strong>{{ Auth::user()->name }}</strong> , muy pronto tendremos mas novedades para ti!
      </div>
    </div>
  </div>
</div>

@endif

@endsection