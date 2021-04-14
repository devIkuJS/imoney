@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center">
                <p>Vas a cambiar de <strong id="text-changeA"></strong> a <strong id="text-changeB"></strong></p>
                <span class="pr-2">Compra: 3.62</span>
                <span>Venta: 3.656</span>
            </div>
            <div class="form-group d-flex mt-3">
                <div class="col-sm-6 text-center">
                    <img src={{asset('icon-calculator/peru.png')}} id="icon-changeA">
                </div>
                <div class="col-sm-6 text-center">
                    <img src={{asset('icon-calculator/usa.png')}} id="icon-changeB">
                </div>
            </div>
            <div class="form-group d-flex">
                <div class="col-sm-5">
                    <label for="amount-one">Envias</label>
                    <input type="text" class="form-control" id="amount-one" onkeypress="return isNumber(event);" >
                </div>
                <div class="col-sm-2">
                    <button class="mt-4" id="swap" value="1">Cambiar</button>
                </div>
                <div class="col-sm-5">
                    <label for="amount-two">Recibes</label>
                    <input type="text" class="form-control" id="amount-two" onkeypress="return isNumber(event);">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script type="text/javascript">
const amountEl_one = document.getElementById('amount-one');
const amountEl_two = document.getElementById('amount-two');
document.getElementById('text-changeA').innerHTML  = "Soles";
document.getElementById('text-changeB').innerHTML  = "Dolares";
let button_change = document.getElementById('swap');
// donde changeCambio= 1 es Soles a Dólares y changeCambio = 2 es Dólares a Soles

let tipoCambio = 3.656;
let tipoCambio_Venta = 3.656;
let tipoCambio_Compra = 3.62;

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



</script>

@stop