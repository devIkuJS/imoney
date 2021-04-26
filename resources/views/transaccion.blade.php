<style>
    .btn-cambiar-ahora {
        background: black !important;
        border-radius: 3rem !important;
        font-size: 1.2rem !important;
        font-weight: bold !important;
        padding: 10px 20px !important;
    }

    #showMe {
        display: none;
    }
</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Transfiere desde tu banco</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold">Nro Orden: {{$transaccion->nro_orden}}</h5>
                        <p class="card-text">Ahora transfiere <strong>{{$transaccion->montoA}}
                                {{$transaccion->descripcionMontoA}}</strong> desde tu <strong>banca por internet
                                ({{$transaccion->banco}})</strong> a la cuenta indicada a continuacion:</p>
                        <p class="card-text"><strong>Nùmero de cuenta:</strong> 1946452215201</p>
                        <p class="card-text"><strong>Banco:</strong> BCP</p>
                        <p class="card-text"><strong>Titular de la cuenta:</strong> iMoney</p>
                        <p class="card-text"><strong>Tipo de cuenta:</strong> Corriente</p>
                        <p class="card-text"><strong>Moneda:</strong> Soles</p>
                        <p class="card-text"><strong>RUC:</strong> 20602075665</p>
                    </div>
                </div>
                <div class="mt-3">
                    <p class="font-weight-bold h5">Tienes un promedio de 25 minutos para realizar la transferencia sin
                        perder el tipo de cambio</p>
                    <p class="font-weight-bold h5 text-white">Hora de inicio:
                        {{ date('H:i:s', strtotime($transaccion->created_at)) }}</p>
                    <p class="font-weight-bold h5 text-white">Hora de fin:
                        {{ date('H:i:s', strtotime($transaccion->created_at)+1500) }}</p>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary btn-cambiar-ahora" type="button" data-toggle="modal"
                        data-target="#modal-declarar-transferencia">Declarar
                        transferencia hecha</button>
                </div>

            </div>
        </div>
    </div>
    </div>
</main>
<div class="modal fade" id="modal-declarar-transferencia" tabindex="-1" role="dialog"
    aria-labelledby="modal-declarar-transferencia" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-declarar-transferencia">Elige como declarar tu transferencia
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('transaccion.enviarOperacion') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" id="select_reporte" name="select_reporte">
                            <option value="">Seleccione el modo de reporte de su transaccion</option>
                            <option value="1">Por Nro Operacion</option>
                            <option value="2">Adjuntar voucher</option>
                        </select>
                    </div>
                    <input type="hidden" name="transaccion_id" value="{{$transaccion->id}}" />

                    <div id="showMe"></div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script type="text/javascript">
    var elem = document.getElementById("select_reporte");
elem.onchange = function(){
    var hiddenDiv = document.getElementById("showMe");

    if(this.value == ""){
        hiddenDiv.style.display = "none";
    }else if(this.value == "1"){
        hiddenDiv.style.display = "block";
        $('#showMe').html('<div class="form-group">'+
                        '<label for="nro_operacion">Nro Operacion</label>'+
                        '<input type="text" class="form-control" name="nro_operacion" id="nro_operacion" >'+
                    '</div>')
    }else if(this.value == "2"){
        hiddenDiv.style.display = "block";
        $('#showMe').html('<div class="form-group">'+
                        '<label for="voucher">Adjuntar Voucher</label>'+
                        '<input type="file" class="form-control-file" name="voucher" id="voucher" accept="image/jpeg,image/png,application/pdf,image/x-eps">'+
                    '</div>');

    }
};


</script>

@stop