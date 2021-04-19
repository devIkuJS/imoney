<style>
   
    .btn-primary{
        font-family: Helvetica, sans-serif !important;
        background: black !important;
        border-radius: 50px !important;
        font-weight: bold !important;
        margin-top:30px;
        letter-spacing: 1.26px;
        font-size: 14px;
        width: 211px;
        border: 1px solid white !important;
    }
    .btn-info{
        font-family: Helvetica, sans-serif !important;
        background: black !important;
        border-radius: 50px !important;
        font-weight: bold !important;
        margin-top:10px;
        letter-spacing: 1.26px;
        font-size: 14px;
        width: 211px;
        border: 1px solid white !important;
        color:white !important;
    }

    .form-control {
        border-radius: 8px !important;
        /*box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);*/
        padding: 10px !important;
        
    }
    
    input:focus, input.form-control:focus {
        outline:none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }
   
  /*  .img-fluid{
        margin-right:3px !important;
        margin-left:3px !important;
        
    }
    .img-fluid2{
        margin-left:80px !important;
    }*/

    .img-fluidEEUU{
        margin-top:63px;
        margin-left: 65px !important;
        border-radius: 100px !important;
    }
    .img-fluidPeru{
        margin-top: 63px;
        margin-left:65px !important;
        border-radius: 100px !important;
    }
    .img-fluidTransfer{
        border-radius: 50px !important;
    }
    .vas-cambiar{
        font-size: 18px !important;
        font-weight: 600;
        color: white;
        letter-spacing: 1.08px;
       /* text-transform: uppercase; */
        margin-top: 0px !important;
    }
    label{
        color: white;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
        font-family: Helvetica, sans-serif !important;
    }
<<<<<<< HEAD

    span {
        font-size: 17px;
=======
    
    span{
        font-size:17px;
        color:white;
        font-family: Helvetica, sans-serif !important;
    }
    .col-sm-2{
        margin-top:40px;
        margin-right:25px;
    }
    .tuEnvias{
        color:black;
        font-size:12px;
    }
    .tuRecibes{
        color:black;
        font-size:12px;
    }


    .form-label{
        color:black;
        font-family: Helvetica, sans-serif;
    }
    .text-dark {
        color: black !important;
        font-family: Helvetica, sans-serif;
    }

    .form-group{
        font-family: Helvetica, sans-serif;
        margin-top:33px;
    }

    .link-dinero {
        font-family: Helvetica, sans-serif;
        color: black !important;
        font-weight: bold;
    }
   
    .km_calc{
        box-shadow: 0 0px 10px rgb(0 0 0 / 12%);
        margin-top: 12px !important;
        padding: 35px 25px;
    }

    .km_calc-encabezado{
        font-family: Helvetica, sans-serif !important;
        font-size: 9px;
        line-height: 25px;
        color: #FFFFFF;
        text-align: center;
    }
    .km_calc-encabezado strong{
        font-weight: 600;
    }


    @media(min-width: 768px){
        .km_calc{
            margin-top: 80px;
        }
        .km_calc-encabezado{
            font-size: 11px;
        }
    }

    @media (max-width: 959px){
    .km_calc {
        padding: 20px 10px;
        }
    }

    @media (max-width: 1280px){
        .km_calc {
            padding: 30px 17px;
        }
        .km_calc {
            box-shadow: 0 0px 10px rgb(0 0 0 / 12%);
            margin-top: 12px !important;
            padding: 35px 25px;
        }
    }

    .km_calc-cont__field{
        border: 1px solid rgba(255,255,255,.6);
        border-radius: 10px;
        margin-bottom: 14px;
        display: flex;
        font-family: Helvetica, sans-serif !important;
        
    }
    .km_calc-cont__field__dato{
        background-color: rgba(255,255,255,1);
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        width: 65%;
        padding: 0px 15px;
        font-family: Helvetica, sans-serif !important;
    }
    .km_calc-cont__field__dato > div > div{
        padding: 4px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .km_calc-cont__field__dato > div > div > span{
        align-content: normal;
        font-family: Helvetica, sans-serif !important;
        font-weight: 600;
        font-size: 10px;
        line-height: 16px;
        color: #081228;
    }
    .km_calc-cont__field__dato > div > div > input{
        font-family: Helvetica, sans-serif !important;
        font-weight: 800;
        font-size: 23px;
        line-height: 99.61%;
        letter-spacing: -0.03em;
        color: black;
        background-color: rgba(0,0,0,0);
        border: 0px;
        padding: 0px;
        max-width: 100%;
        
    }

    .km_calc-cont__field__monedas{
        font-family: Helvetica, sans-serif !important;
        /*background-color: #060f25; */
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        min-width: 35%;
        position: relative;
    }

    .km_calc-cont__field__monedas > div {
        padding: 21px 10px;
        text-align: center;
    }
    .km_calc-cont__field__monedas > div > strong{
        font-family: Helvetica, sans-serif !important;
        font-weight: 700;
        font-size: 16px;
        line-height: 99.61%;
        color: #fff;
    }


    .km_calc-cont__field__monedas img {
        position: absolute;
        width: 46px;
        height: auto;
        left: -22px;
        top: -25px;
        cursor: pointer;
    }

    /*.km_calc-cont__field__monedas .img-fluidPeru {
        position: absolute;
        width: 46px;
        height: auto;
        left: -62px;
        top: -25px;
        cursor: pointer;
    }

    .km_calc-cont__field__monedas .img-fluidEEUU {
        position: absolute;
        width: 46px;
        height: auto;
        left: -62px;
        top: -25px;
        cursor: pointer;
    }*/
    .km_calc-cont__field__monedas .btn {
        position: absolute;
        width: 46px;
        height: 50px;
        left: -22px;
        top: -40px;
        cursor: pointer;
    }


    .km_calc .subheadertext{
        margin-top: 1rem;
        margin-bottom: 1rem;
        font-family: Helvetica, sans-serif !important;
        font-style: normal;
        font-weight: normal;
        line-height: 15px;
        text-align: center;
        color: #FFFFFF; 
        font-size: 12px;
    }
    .km_calc .subheadertext strong{
        font-family: Helvetica, sans-serif !important;
        font-weight: 600;
        font-size: 11px;
    }

    .km_calc .margeboton{
        text-align: center;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .km_calc .iopera{
        border-radius: 50px;
        font-family: Helvetica, sans-serif !important;
        font-weight: 700;
        font-size: 16px;
        line-height: 16px;
        text-align: center;
        color: #060f25;
        padding: 15px 40px;
        box-sizing: border-box;
        background-color: #00E3C2;
        display: inline-block;
    }

    .km_calc .iopera:hover{
        text-decoration: none;
        color: #070f50;
    }

    .km_calc .disclaim{
        font-family: Helvetica, sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 16px;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        color: black;
        text-align: center;
    }
    .km_calc .disclaim img{
        margin-right: 0.5rem;
        width: 20px;
    }

    @media(min-width: 768px){
        .km_calc .subheadertext{
            font-size: 13px;
        }
        .km_calc .subheadertext strong{
            font-size: 14px;
        }
    }
    element.style {
        transform: rotate(0deg);

>>>>>>> feature/tipocambio
    }
</style>


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
           <!-- <div class="text-center">
                <p class="vas-cambiar">Vas a cambiar de <strong id="text-changeA"></strong> a <strong id="text-changeB"></strong></p>
                <p class="vas-cambiar">Tipo de Cambio del dólar</p>
                <span class="pr-2">Compra: 3.6300</span>
                <span>Venta: 3.6400</span> 
            </div> -->
            
          <!--  <div class="form-group d-flex mt-3">
                <div class="col-sm-6 text-center">
                    <img src={{asset('icon-calculator/peru.png')}} id="icon-changeA" class="img-fluid">
                </div>
                <div class="col-sm-6 text-center">
                    <img src={{asset('icon-calculator/usa.png')}} id="icon-changeB" class="img-fluid2">
                </div>
            </div> -->
            <div class="km_calc">
                <div class="km_calc-encabezado">
                    <div class="text-center">
                        <p class="vas-cambiar">Tipo de Cambio del dólar</p>       
                    </div>
                    <div class="row">
                        <div class="col-md-6 col">
                            <label>Compra:</label>
                        </div>
                        <div class="col-md-6 col">
                            <label>Venta:</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6 col">
                            <label>S/.3.6300</label>
                        </div>
                        <div class="col-md-6 col">
                            <label>S/.3.6400</label>
                        </div> 
                    </div>
                </div>
            <div class="km_calc-cont">
            <div class="p-0 km_calc-cont__field">
                        <div class="km_calc-cont__field__dato">
                            <div>
                                <div>    
                                    <label for="amount-one" class="tuEnvias">Envias</label>
                                    <input type="text" class="" id="amount-one" onkeypress="return isNumber(event);" >
                                </div>
                            </div>
                        </div>
                        <div class="monedas km_calc-cont__field__monedas">
                            <div id="inicio" cambio="pen">
                                <img src={{asset('icon-calculator/peru.png')}} id="icon-changeA" class="img-fluidPeru">
                                <strong id="text-changeA"></strong>
                            </div>
                        </div>
            </div>
            <div class="p-0 km_calc-cont__field">
                <div class="km_calc-cont__field__dato">
                    <div>
                      <div>       
                          <label for="amount-two" class="tuRecibes">Recibes</label>
                          <input type="text" class="" id="amount-two" onkeypress="return isNumber(event);">
                        </div>
                    </div>
                </div>
                <div class="monedas km_calc-cont__field__monedas" style="width: 20%;">
                
                    <img src={{asset('icon-calculator/change.svg')}} class="make-it-slow lazyloaded" id="change" alt="icon-update" data-ll-status="loaded">
                    <img src={{asset('icon-calculator/convertir_calculadora2.png')}} id="swap" value="1" class="img-fluid">
                    <!--  <button type="button" class="btn btn-info" id="swap" value="1"><i class="fas fa-exchange-alt"></i>&nbsp;</button> -->
                        
                    <div id="final" cambio="usd" style="margin:auto;">
                        <img src={{asset('icon-calculator/usa.png')}} id="icon-changeB" class="img-fluidEEUU">
                        <strong id="text-changeB"></strong> 
                    </div>
                </div>
            </div>

            
            <div class="margeboton">
                <div>
                    <a href="{{ route('operacion') }}" class="btn btn-primary" role="button" id="cambiarAhora">{{ __('Confirmar Operación') }}</a> 
                </div>
            </div>
            <div class="subheadertext">
                
                <div class="disclaim" style="font-weight:bold;">       
                <div>
                    <img id="accionarbotonexeso" src={{asset('icon-calculator/masinfo.svg')}} alt="icon-ayuda">¿Monto mayor a <b>U$10,000</b> o <b>S/ 35,000</b>
                </div>   
            </div>
            <div>
            
      </div>
    </div>
  </div>
          <!--  <div class="col-sm-2">
                    <button class="mt-4" id="swap" value="1">Cambiar</button>
            </div> -->
           
                
                    
            </div>
        </div>
    </div>
    <div>
    
         <!--   <label class="texto">Negocia directamente con nuestra
            <a href="#" target="_blank" class="text-dark link-mesa">Mesa de Dinero vía WhatsApp en línea.</a>
            <a href="#" target="_blank" class="text-dark link-mesa">RECUERDA:</a>                                               
             Confirma que estas autorizado por tu banco para transferir el monto
            deseado. Solo aceptamos transfererencias y CCI de tus cuentas de banco.
            No aceptamos depósitos de efectivo en ventanilla.</label>     -->
           <div class="form-group row">
                <div class="col-md-12 mx-auto">
                    <div class="form-check">
                                                    
                        <label class="form-label" for="accept">Negocia directamente con nuestra
                            <a href="#" target="_blank"
                                class="text-dark link-dinero" style="text-decoration-line: underline;">Mesa de Dinero vía WhatsApp en línea.</a>
                            <a href="#" target="_blank"
                                class="text-dark link-dinero" style="text-decoration-line: underline;">RECUERDA:</a>
                                Confirma que estas autorizado por tu banco para transferir el monto
                                deseado. 
                                Solo aceptamos transfererencias y CCI de tus cuentas de banco.
                                No aceptamos depósitos de efectivo en ventanilla.</label>               
                    </div>                                             
                </div>
            </div> 
                    
</div>
@endsection

@section('custom-script')
<script type="text/javascript">
    const dataEncode = {!! json_encode($tipoCambio, JSON_HEX_TAG) !!};
let tipoCambio = dataEncode[0].venta;
let tipoCambio_Venta = dataEncode[0].venta;
let tipoCambio_Compra = dataEncode[0].compra;

const amountEl_one = document.getElementById('amount-one');
const amountEl_two = document.getElementById('amount-two');
document.getElementById('text-changeA').innerHTML  = "Soles";
document.getElementById('text-changeB').innerHTML  = "Dólares";
let button_change = document.getElementById('swap');
const button_save = document.getElementById('cambiarAhora');
// donde changeCambio= 1 es Soles a Dólares y changeCambio = 2 es Dólares a Soles

let tipoCambio = 3.6400;
let tipoCambio_Venta = 3.6400;
let tipoCambio_Compra = 3.6300;

//validate only numbers
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function calculateMontoAtoMontoB() {

    button_change.value == 2 ? 
    amountEl_two.value = (amountEl_one.value*tipoCambio).toFixed(2) : 
    amountEl_two.value = (amountEl_one.value/tipoCambio).toFixed(2);

}

amountEl_one.addEventListener('input', calculateMontoAtoMontoB);

function calculateMontoBtoMontoA() {

    button_change.value == 1 ? 
    amountEl_one.value = (amountEl_two.value*tipoCambio).toFixed(2) : 
    amountEl_one.value = (amountEl_two.value/tipoCambio).toFixed(2);

}

amountEl_two.addEventListener('input', calculateMontoBtoMontoA);


swap.addEventListener('click', ()=> {

    if (button_change.value == 1) {
      document.getElementById('text-changeA').innerHTML  = "Dolares";
      document.getElementById('text-changeB').innerHTML  = "Soles";
      document.getElementById("icon-changeA").src="icon-calculator/usa.png";
      document.getElementById("icon-changeB").src="icon-calculator/peru.png";
      tipoCambio = tipoCambio_Compra;
      button_change.value = 2;
      amountEl_two.value = (amountEl_one.value*tipoCambio).toFixed(2);
    } else {
      document.getElementById('text-changeA').innerHTML  = "Soles";
      document.getElementById('text-changeB').innerHTML  = "Dolares";
      document.getElementById("icon-changeA").src="icon-calculator/peru.png";
      document.getElementById("icon-changeB").src="icon-calculator/usa.png";
      tipoCambio = tipoCambio_Venta;
      button_change.value = 1;
      amountEl_two.value = (amountEl_one.value/tipoCambio).toFixed(2);
    }
  
})

button_save.addEventListener('click', ()=>{

    if(amountEl_one.value == "" || amountEl_one.value == 0){

        alert("Por favor, ingrese una cantidad valida")

    }else{
        $.ajax({
            type: "POST",
            url: "{{ route('tipoCambio.getTipoCambio')}}",
            data: { 
            tipoCambio: tipoCambio ,
            descripcionMontoA: document.getElementById('text-changeA').innerHTML,
            descripcionMontoB: document.getElementById('text-changeB').innerHTML,
            montoA: amountEl_one.value,
            montoB: amountEl_two.value,
            _token:"{{ csrf_token() }}",
            },
            success: function (data) {
            window.location.href = "operacion";

            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);

            },
        });

      } 
});


</script>

@stop