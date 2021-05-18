<style>
    .btn-invertir {
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

    .form-control{
        background-color:transparent !important;
        border:none !important       
    }

    .input-monto{
        outline: 0 !important;
        /*color: #fff !important;*/
        border-bottom: 3px solid white !important;
        font-size:24px !important;
    }
    input:focus, input.form-control:focus {
        outline:none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }
    #amount-monto {  
        color:white;
    }

    #amount-monto::placeholder {
    color:white;
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
    .col-form-label{
        background: white !important;       
    }

  
    @media (max-width: 575.98px) {
        div.card {
            width: 8rem !important;
        }
    }

    @media (max-width: 767.98px) {
        div.card {
            font-size:10px !important;
        }
        h5{
            font-size:15px !important; 
        }
        span.h3{
            font-size:22px !important; 
        }
        
    }

    @media (max-width: 991.98px) {
        div.card {
            width:10rem !important;
        }
    }

    @media (max-width: 1199.98px) {
        div.card {
            width:10rem !important;
        }
    }
   
</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row">

            <div class="col-md-12 text-center">
                <span class="font-weight-bold h2">Característica de la Inversión - Deuda </span>            
            </div>
            <div class="col-md-12 mx-auto">
                    <div class="row mt-4">
                        <div class="col-6">
                                <h5 class="text-white text-left font-weight-bold">Tasa anualizada</h5>
                                <div class="card font-weight-bold py-2 w-50 text-center float-left">13.63%</div>
                        </div>
                        <div class="col-6">
                                <h5 class="text-white text-right font-weight-bold">Fecha proyectada de cobro</h5>
                                <!--<div class="card font-weight-bold py-2 w-50 text-center float-right">19/08/2021</div>-->
                                <div class="card font-weight-bold py-2 w-50 text-center float-right">{{ date('d-m-Y', strtotime(now())) }}</div>
                        </div> 
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                                <h5 class="text-white text-left font-weight-bold">Tasa mensual</h5>
                                <div class="card font-weight-bold py-2 w-50 text-center float-left">1.0706%</div>
                        </div>
                        <div class="col-6">
                                <h5 class="text-white text-right font-weight-bold">Numero de factura</h5>
                                <div class="card font-weight-bold py-2 w-50 text-center float-right">F0001-00000076</div>
                        </div> 
                    </div>
            <div>
            
            <div class="col-md-12 mt-4 text-left">
                <span class="font-weight-bold h3">Operación de Factoring</span>            
            </div>

                <div class="col-md-12 mx-auto">
                    <div class="row mt-4">
                            <div class="col-12 text-left">
                                <h4 class="text-white font-weight-bold ">Quiero Invertir</h4>
                                <input type="text" id="amount-monto" placeholder="Monto" maxlength="4" class="form-control input-monto font-weight-bold"
                                    onkeypress="return isNumber(event);"/>
                                    <h5 class="text-black text-center font-weight-bold">(cuentas con USD 0.00 disponibles)</h5>
                            </div>  
                    </div>

                    <div class="row mt-4">
                            <div class="col-6">
                                <h5 class="text-white font-weight-bold text-left">Monto disponible de la factura</h5>
                                <h5 class="text-white font-weight-bold text-left">106,721.92</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="text-white font-weight-bold text-right">Retorno esperado</h5>
                                <h5 class="text-white font-weight-bold text-right">+USD 0.00</h5>
                                <div class="card font-weight-bold py-2 w-50 text-center float-right">113 dias</div>
                                <!--<input type="text" class="col-form-label text-right rounded-pill float-right" placeholder="113 dias" disabled></input>-->
                            </div>
                    </div>

                    
                    <div class="text-center mt-4">
                        <button class="btn btn-primary btn-invertir" type="button" id="invertir">Invertir
                            </button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('custom-script')
<script>
    function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
          return true;
}
</script>
@stop