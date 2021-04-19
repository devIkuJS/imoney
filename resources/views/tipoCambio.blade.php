<style>
    .btn-primary {
        font-family: Helvetica, sans-serif !important;
        background: #0274be !important;
        border-radius: 50px !important;
        font-weight: bold !important;
        margin-top: 50px;
        letter-spacing: 1.26px;
        font-size: 14px;
        width: 211px;
    }

    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        margin-top: 20px;
    }

    .img-Peru {
        margin-right: 40px !important;
    }

    .img-EEUU {
        margin-left: 40px !important;
    }

    p {
        font-size: 27px !important;
        font-weight: 600;
        color: #2375f0;
        letter-spacing: 1.08px;
        text-transform: uppercase;
        margin-top: 60px !important;
    }

    label {
        color: #2375f0;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
        font-family: Helvetica, sans-serif !important;
    }

    span {
        font-size: 17px;
    }
</style>


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center">
                <p>Vas a cambiar de <strong id="text-changeA"></strong> a <strong id="text-changeB"></strong></p>
                <span class="pr-2">Compra: <strong id="t-compra"></strong></span>
                <span>Venta: <strong id="t-venta"></strong></span>
                <strong></strong>
            </div>
            <div class="form-group d-flex mt-3">
                <div class="col-sm-6 text-center">
                    <img src={{asset('icon-calculator/peru.png')}} id="icon-changeA" class="img-Peru">
                </div>
                <div class="col-sm-6 text-center">
                    <img src={{asset('icon-calculator/usa.png')}} id="icon-changeB" class="img-EEUU">
                </div>
            </div>
            <div class="form-group d-flex">
                <div class="col-sm-5">
                    <div class="text-center">
                        <label for="amount-one" class="tacharDescuentoVenta">Envias</label>
                        <input type="text" class="form-control" id="amount-one" onkeypress="return isNumber(event);">
                    </div>
                </div>
                <div class="col-sm-2">
                    <button class="mt-4" id="swap" value="1">Cambiar</button>
                </div>
                <div class="col-sm-5">
                    <div class="text-center">
                        <label for="amount-two">Recibes</label>
                        <input type="text" class="form-control" id="amount-two" onkeypress="return isNumber(event);">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="button" id="cambiarAhora">Cambiar Ahora</button>
                </div>
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