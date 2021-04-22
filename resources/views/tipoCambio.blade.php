<style>
    .form-group {
        position: relative;
        min-height: 3.5em;
    }

    input.form-control {
        height: 4.8em;
        position: absolute;
        top: 0;
        left: 0;
    }

    label.form-control-label {
        position: absolute;
        /*font-size: 1.1em; */
        font-size: 1.4em;
        top: 0;
        left: 5px;
        padding: 8px 8px;
    }

    .input-calculator {
        padding-top: 2.5rem !important;
        padding-bottom: 1rem !important;
        font-size: 1rem !important;
        font-weight: bold !important;
    }
    
    .border-content-change {

        border: 1.5px solid #fff;
        border-radius: 0.25rem;
        padding-top: 19.4px;
        padding-bottom: 19.4px;

    }

    .btn-cambiar-ahora {
        background: black !important;
        border-radius: 3rem !important;
        font-size: 1.2rem !important;
        font-weight: bold !important;
        padding: 12px 25px !important;
    }

    .row {
        margin-left: -10px !important;
        margin-right: -17px !important;
    }

    p {
        font-size: 1rem !important;
    }

    .enlace-wsp {

        color: black;
        text-decoration: underline;
    }

    .enlace-wsp:hover {
        color: #343a40 !important;
    }

    .button-change {
        background-size: 100%;
        background-repeat: no-repeat;
        width: 55px;
        height: 55px;
        border: none;
        outline: none;
        z-index: 20;
        position: absolute;
        top: 20%;
        left: 0;
        right: 0;
        margin: auto;
    }

    @media (max-width: 575.98px) {
        .button-change {
            top: 18%;
        }
    }

    @media (max-width: 767.98px) {
        .button-change {
            top: 20%;
        }
    }

    @media (max-width: 991.98px) {
        .button-change {
            top: 16.5%;
        }
    }

    @media (max-width: 1199.98px) {
        .button-change {
            top: 19%;
        }
    }


</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row">

            <div class="col-md-12 text-center">
                <h3 class="text-white font-weight-bold">Tipo de cambio de dolár</h3>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="text-center">
                    <div class="row text-center">
                        <div class="col-6">
                            <h4 class="text-white font-weight-bold">Compra</h4>
                            <h4 id="t-compra" class="text-white font-weight-bold"></h4>
                        </div>
                        <div class="col-6">
                            <h4 class="text-white font-weight-bold">Venta</h4>
                            <h4 id="t-venta" class="text-white font-weight-bold"></h4>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="amount-one" class="form-control input-calculator font-weight-bold"
                                    onkeypress="return isNumber(event);" />
                                <label class="form-control-label font-weight-bold" for="envias">Envías</label>
                            </div>

                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center border-content-change">
                                    <strong class="text-left text-white h4 text-change mr-4 font-weight-bold" id="text-changeA"></strong>
                                    <img src={{asset('icon-calculator/bandera_peru.png')}} width="40" id="icon-changeA">
                                </div>
                            </div>
                        </div>
                        <input class="button-change" type="image"
                            src={{asset('icon-calculator/convertir_calculadora2.png')}} id="swap" value="1" />
                        <div class="row" style="margin-top:0.5rem;">
                            <div class="col-6">
                                <input type="text" id="amount-two" class="form-control input-calculator font-weight-bold"
                                    onkeypress="return isNumber(event);" />
                                <label class="form-control-label font-weight-bold" for="recibes">Recibes</label>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center border-content-change">
                                    <strong class="text-left text-white h4 text-change mr-4 font-weight-bold"
                                        id="text-changeB">Soles</strong>

                                    <img src={{asset('icon-calculator/bandera_usa.png')}} width="40" id="icon-changeB">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button class="btn btn-primary btn-cambiar-ahora" type="button" id="cambiarAhora">Confirmar
                        Operación</button>
                </div>

                <div class="text-center mt-5">
                    <h5 class="font-weight-bold text-white"><img src={{asset('icon-calculator/masinfo.svg')}}
                            class="mr-2 mb-1" alt="icon-ayuda">Monto Mayor a U$ 10,000 o S/.35,000</h5>
                    <p class="font-weight-bold">Negocia directamente con nuestra <a
                            href="https://api.whatsapp.com/send?phone=+51982273702&text=Quiero%20mas%20informacion"
                            target="_blank" class="enlace-wsp">Mesa de dinero vía Whastapp en línea.</a></p>
                    <p class="font-weight-bold"><strong>RECUERDA</strong>: Confirma que estas autorizado por tu banco
                        para transferir el monto deseado. Solo aceptamos transferencias y CCI de tus cuentas de banco.
                    </p>
                    <p class="font-weight-bold">No aceptamos depósitos de efectivo en ventanilla.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection

@section('custom-script')
<script type="text/javascript">
    const dataEncode = {!! json_encode($tipoCambio, JSON_HEX_TAG) !!};
    console.log(dataEncode);
let tipoCambio = dataEncode[0].venta;
let tipoCambio_Venta = dataEncode[0].venta;
let tipoCambio_Compra = dataEncode[0].compra;
const amountEl_one = document.getElementById('amount-one');
const amountEl_two = document.getElementById('amount-two');
document.getElementById('text-changeA').innerHTML  = "Soles";
document.getElementById('text-changeB').innerHTML  = "Dolares";
document.getElementById('t-compra').innerHTML  = tipoCambio_Compra;
document.getElementById('t-venta').innerHTML  = tipoCambio_Venta;
let button_change = document.getElementById('swap');
const button_save = document.getElementById('cambiarAhora');
// donde changeCambio= 1 es Soles a Dólares y changeCambio = 2 es Dólares a Soles
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
      document.getElementById("icon-changeA").src="icon-calculator/bandera_usa.png";
      document.getElementById("icon-changeB").src="icon-calculator/bandera_peru.png";
      tipoCambio = tipoCambio_Compra;
      button_change.value = 2;
      amountEl_two.value = (amountEl_one.value*tipoCambio).toFixed(2);
    } else {
      document.getElementById('text-changeA').innerHTML  = "Soles";
      document.getElementById('text-changeB').innerHTML  = "Dolares";
      document.getElementById("icon-changeA").src="icon-calculator/bandera_peru.png";
      document.getElementById("icon-changeB").src="icon-calculator/bandera_usa.png";
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