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
        /*  background-color: transparent !important;
        border: none !important
        */
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
    div.border{
        border: 5px solid #ffffff !important;
    }
    
</style>


@extends('layouts.app')
@section('content')
<main>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="font-weight-bold h2">Hola, </span><span id="hi2"
                    class="font-weight-bold text-white h1"></span>
                    <h3 class="font-weight-bold h2"> te presentamos nuestras oportunidades de inversión para hoy {{ date('d-m-Y', strtotime(now())) }} </h3>   
            </div>
                    <div class="col-md-12 mx-auto mb-5">
                        <div class="row mt-5">
                            <div class="col-6 text-left">
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
                        <!--<div class="border mx-auto mb-3">-->
                        <div class="form-group row mt-5">
                            <div class="row mt-5">
                                <div class="col-6 text-left">
                                    <h4 class="text-white font-weight-bold">Empresa pagadora</h4>
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <div class="col-6 text-left">
                                <h4 class="text-white font-weight-bold">{{ $empresa->nombre }}</h4>
                                    <h4 class="text-white font-weight-bold">RUC {{ $empresa->numero_ruc }}</h4>                                   
                                </div>
                                <div class="col-6 text-right">
                                    <img src={{asset($empresa->logo)}} width="120" height="70">
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <div class="col-6 text-left">
                                    <h5 class="text-white font-weight-bold">Monto disponible</h5>
                                    <h5 class="text-white font-weight-bold">{{ $empresa->monto_disponible }} {{ $empresa->moneda_inversion === '1' ? 'Soles' : 'Dolares' }}</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <h5 class="text-white font-weight-bold">Monto total</h5>
                                    <h5 class="text-white font-weight-bold">{{ $empresa->monto_total }} {{ $empresa->moneda_inversion === '1' ? 'Soles' : 'Dolares' }}</h5>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-12">
                                    <div class="progress">
                                        <div id="inversionista" class="progress-bar bg-dark" role="progressbar"
                                            style="width: 30%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-3">
                                    <h5 class="text-white text-left font-weight-bold">Tasa anualizada</h5>
                                    <div class="card font-weight-bold py-2 w-50 text-center float-left">{{ $empresa->tasa_anual }}%</div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center mt-4 ">
                                        <button type="button" class="btn btn-primary btn-cambiar-ahora"
                                            data-toggle="modal" data-target="#modal-ver-detalle-{{$empresa->id}}">Ver
                                            detalle</button>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h5 class="text-white text-right font-weight-bold ">Plazo</h5>
                                    <div class="card font-weight-bold py-2 w-50 text-center float-right">
                                        {{ $empresa->cantidad_dias }} días</div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ver detalle -->
                        <div class="modal fade" id="modal-ver-detalle-{{$empresa->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-ver-detalle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold" id="modal-crear-cuenta">Característica
                                            de la Inversión - Deuda
                                        </h5>
                                        <button type="button" class="close close-detalle" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route ('inversionista.gestion') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <h5 class="font-weight-bold">Empresa pagadora</h5>
                                                    <h5 class="font-weight-bold">{{ $empresa->nombre }}</h5>
                                                    <!--<h5 class="font-weight-bold">RUC {{ $empresa->numero_ruc }}</h5>-->                                   
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="text-right font-weight-bold">Teaser informativo</h5>
                                                    <a href="{{asset($empresa->informe)}}" target="_blank"><button
                                                            type="button" class="btn btn-danger float-right"><i
                                                            class="far fa-file-pdf pr-2"></i>Ver PDF</button></a>                               
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <h5 class="font-weight-bold">Tasa anual</h5>
                                                    <div class="card font-weight-bold py-2 w-50 text-center float-left">
                                                        {{ $empresa->tasa_anual }}%</div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="font-weight-bold">Fecha proyectada de cobro</h5>
                                                    <div class="card font-weight-bold py-2 w-50 text-center float-right">
                                                        {{ date('d-m-Y', strtotime($empresa->fecha_esperada )) }}</div>
                                                </div>
                                                <!--<div class="col-6">
                                                   <h5 class="text-right font-weight-bold">Teaser informativo</h5>
                                                    <a href="{{asset($empresa->informe)}}" target="_blank"><button
                                                            type="button" class="btn btn-danger float-right"><i
                                                                class="far fa-file-pdf pr-2"></i>Ver PDF</button></a>
                                                </div>-->
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                <h5 class="font-weight-bold">Tasa mensual</h5>
                                                    <div class="card font-weight-bold py-2 w-50 text-center float-left">
                                                       {{ $empresa->tasa_mensual }}%</div>
                                                </div>
                                                <div class="col-6">
                                                <h5 class="font-weight-bold text-right">Código de Doc.</h5>
                                                    <div class="card font-weight-bold py-2 w-50 text-center float-right">
                                                        {{ $empresa->serie_num_comprobante }}</div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mt-5">
                                                <div class="col-md-12 mt-4 text-left">
                                                    <span class="font-weight-bold h3">Operación de Factoring</span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-12 text-left">
                                                    <h4 class="font-weight-bold ">Quiero Invertir</h4>
                                                    <input type="text" class="form-control monto_cambio"
                                                        placeholder="Ingrese monto a invertir" name="monto_cambio" id="monto_cambio_{{$empresa->id}}"
                                                        onkeypress="return isNumber(event);" />
                                                    <input type="hidden" name="inversion_id" value="{{$empresa->id}}" />
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <h5 class="font-weight-bold text-left">Monto disponible de la
                                                        factura</h5>
                                                    <h5 class="font-weight-bold text-left">
                                                        {{ $empresa->monto_disponible }} {{ $empresa->moneda_inversion === '1' ? 'Soles' : 'Dolares' }}</h5>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="font-weight-bold text-right">Retorno esperado</h5>
                                                    <h5 class="font-weight-bold text-right monto_esperado"></h5>

                                                    <input type="hidden" name="monto_esperado" value=""/>
                                                    <div
                                                        class="card font-weight-bold py-2 w-50 text-center float-right d-inline">
                                                        <strong id="cantidad_dias_{{$empresa->id}}">{{ $empresa->cantidad_dias }}</strong>&nbsp;<strong>dias</strong></div>

                                                        <input type="hidden" name="cantidad_dias" value="{{ $empresa->cantidad_dias }}"/>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="text-center mt-4">
                                                    <button class="btn btn-primary btn-cambiar-ahora"
                                                        type="submit">Invertir
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ver detalle -->
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

var inputs = $('.monto_cambio');


for (var i=0; i<inputs.length; i++) {
  $(inputs[i]).keyup(function() {

      var id = $(this).attr('id')

      var res = id.charAt(id.length-1);
      var cantidad_dias = $('#cantidad_dias_'+res).text().trim();

      var monto_esperado = (this.value*(Math.pow(1.08, (cantidad_dias/360)))).toFixed(2);

      $('.monto_esperado').text(monto_esperado + " "+ "Soles");
      
  });
}


$(".close-detalle").click(function(){
  $('.monto_esperado').text("");
  $('#shares').val('');
});


function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
          return true;
}
$(document).ready(function() {
$.ajax({
    url: `/inversionista/razonSocial`,
	success: function(respuesta) {
		console.log(respuesta);
		$("#hi2").html(respuesta);
	},
	error: function() {
        console.log("No se ha podido obtener la informacion");
    }
});

});
</script>
@stop