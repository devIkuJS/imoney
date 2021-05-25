<style>
    .btn-cambiar-ahora {
        background: black !important;
        border-radius: 3rem !important;
        font-size: 1.2rem !important;
        font-weight: bold !important;
        padding: 10px 20px !important;
        border: transparent !important;
    }

    .div-border {
        border: 2px solid #fff;
        border-radius: 10px;

    }

    /* Activado */
    .custom-control-input:checked~.custom-control-label::before {
        border-color: black !important;
        background-color: black !important;

    }

    /* Desactivado*/
    .custom-control-label:before {
        border-color: green !important;
        background-color: green !important;
    }

    .btn-danger {
        /*background: transparent !important;*/
    }

    @media (max-width: 575.98px) {
        h4 {
            font-size: 15px !important;
        }

        div.card {
            width: 4rem !important;
        }

        h5 {
            font-size: 14px !important;
        }
    }

    @media (max-width: 767.98px) {
        h4 {
            font-size: 15px !important;
        }

        h5 {
            font-size: 15px !important;
        }

        span.h3 {
            font-size: 22px !important;
        }

        div.card {
            font-size: 10px !important;
        }
    }

    @media (max-width: 991.98px) {
        h4 {
            font-size: 17px !important;
        }

        div.card {
            width: 10rem !important;
        }
    }

    @media (max-width: 1199.98px) {
        h4 {
            font-size: 17px !important;
        }

        div.card {
            width: 10rem !important;
        }
    }


    .form-control {
        background-color: transparent !important;
        border: none !important
    }

    .input-monto {
        outline: 0 !important;
        /*color: #fff !important;*/
        border-bottom: 3px solid white !important;
        font-size: 24px !important;
    }

    input:focus,
    input.form-control:focus {
        outline: none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }

    #amount-monto {
        color: white;
    }

    #amount-monto::placeholder {
        color: white;
    }

    #amount-monto::-webkit-input-placeholder {
        color: white;
    }

    #amount-monto::-moz-placeholder {
        color: white;
    }

    #amount-monto:-ms-input-placeholder {
        color: white;
    }

    #amount-monto:-moz-placeholder {
        color: white;
    }

    .col-form-label {
        background: white !important;
    }
</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row">

            <div class="col-md-12 text-center">
                <span class="font-weight-bold h2">Hola, </span><span
                    class="font-weight-bold h2">{{ Auth::user()->name }}</span>
                <span class="font-weight-bold text-black h2">este es tu saldo disponible:</span>
            </div>
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <div class="col-6 text-right">
                        <h4 class="font-weight-bold">PEN 0.00</h4>
                    </div>
                    <div class="col-6 text-left">
                        <h4 class="font-weight-bold">USD 0.00</h4>
                    </div>
                </div>
                <div>

                    <div class="col-md-12 mx-auto mb-5">
                        <div class="row mt-5">
                            <div class="col-6 text-left">
                                <h4 class="text-white font-weight-bold">Oportunidades de Inversión</h4>
                            </div>
                            <div class="col-6">
                                <div class="d-flex float-right">
                                    <span class="mr-2 font-weight-bold text-white">PEN</span>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label text-white font-weight-bold"
                                            for="customSwitch1">USD</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($empresas as $empresa)
                        <div>
                            <div class="row mt-5">
                                <div class="col-6 text-left">
                                    <h4 class="text-white font-weight-bold">Empresa pagadora</h4>
                                    <img src={{asset('imagenes_empresa/imoney.jpg')}} width="120" height="70" class="mr-3">
                                </div>
                                <div class="col-6 text-right">
                                    <h4 class="text-white font-weight-bold">{{ $empresa->nombre }}</h4>
                                    <img src={{asset($empresa->logo)}} width="120" height="70" >
                                </div>
                            </div>
    
                            <div class="row mt-5">
                                <div class="col-6 text-left">
                                    <h5 class="text-white font-weight-bold">Monto disponible</h5>
                                    <h5 class="text-white font-weight-bold">{{ $empresa->monto_disponible }}</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <h5 class="text-white font-weight-bold">Monto total</h5>
                                    <h5 class="text-white font-weight-bold">144,432.00</h5>
                                </div>
                            </div>
    
                            <div class="row text-center">
                                <div class="col-12">
                                    <div class="progress">
                                        <div id="inversionista" class="progress-bar bg-dark" role="progressbar"
                                            style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mt-4">
                                <div class="col-3">
                                    <h5 class="text-white text-left font-weight-bold">Tasa anualizada</h5>
                                    <div class="card font-weight-bold py-2 w-50 text-center float-left">8%</div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center mt-4 ">
                                        <button class="btn btn-primary btn-cambiar-ahora">Invertir</button>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h5 class="text-white text-right font-weight-bold ">Plazo</h5>
                                    <div class="card font-weight-bold py-2 w-50 text-center float-right">{{ $empresa->fecha_esperada }} días</div> 
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('custom-script')
<script>
    var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("inversionista");
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}
function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
          return true;
}
</script>
@stop()