<style>
    .btn-cambiar-ahora {
        background: black !important;
        border-radius: 3rem !important;
        font-size: 1.2rem !important;
        font-weight: bold !important;
        padding: 10px 20px !important;
        border: transparent !important;
    }

    #showMe {
        display: none;
    }

    .div-border {
        border: 2px solid #fff;
        border-radius: 10px;

    }
    .text-error {
        color: #8f0000;
    }
</style>


@extends('layouts.app')

@section('content')
<main>
    <div class="container pt-5">

        <div class="row">

            <div class="col-md-12 text-center">
                <h3 class="text-white font-weight-bold"><img src={{asset('imagenes/icon-transfiere.png')}} width="30"
                        height="30" class="mr-3">Transfiere desde tu banco</h3>
            </div>
            <div class="col-md-10 mx-auto">

                <div class="row mt-4 text-center py-2 div-border col-md-5 mx-auto">
                    <div class="col-12">
                        <h4 class="font-weight-bold text-white">Nro Orden</h4>
                        <h5 class="font-weight-bold text-white"></h5>
                    </div>
                </div>

                <div class="col-md-12">


                    <p class="text-center mt-3 font-weight-bold h5 text-white">Ahora transfiere <strong
                            class="text-dark">
                                    </strong> desde tu <strong class="text-dark">banca por
                            internet
                                </strong> a cualquiera de las cuentas indicada a continuacion:</p>

                    <div class="text-center mt-4">
                        <strong class="font-weight-bold text-white h5 mr-4">Razon social: iMoney Perú SAC</strong>
                        <strong class="font-weight-bold text-white h5 mr-4">RUC: 20602075665</strong>
                        <strong class="font-weight-bold text-white h5 mr-4">Moneda: </strong>
                    </div>

                    

                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                BCP
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                <strong>Cuenta Corriente: 193-2543783-0-76</strong>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                CCI: 00219300254378307610
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Interbank
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Cuenta Corriente: 200-3001857191
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                CCI: 00320000300185719136
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Pichincha
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Cuenta Corriente: 1202094503
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                CCI: 035-058001202094503-71
                            </div>
                        </div>
                    </div>

                    

                    

                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                BCP
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                <strong>Cuenta Corriente: 193-2532125-1-29</strong>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                CCI: 00219300253212512917
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Interbank
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Cuenta Corriente: 200-3001857204
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                CCI: 00320000300185720437
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Pichincha
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                Cuenta Corriente: 1202094597
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card font-weight-bold text-center py-2">
                                CCI: 035-058001202094597-73
                            </div>
                        </div>
                    </div>

            

                 

                    

                    <p class="text-center mt-4 font-weight-bold h5">Tienes un promedio de 60 minutos para realizar la
                        transferencia sin
                        perder la oportunidad de inversión.</p>

                    <p class="font-weight-bold h5 text-white text-center">Hora de inicio:
                        </p>
                    <p class="font-weight-bold h5 text-white text-center">Hora de fin:
                        </p>

                    <div class="text-center my-4">
                        <button class="btn btn-primary btn-cambiar-ahora" type="button" data-toggle="modal"
                            data-target="#modal-declarar-transferencia">Adjunta tu transferencia</button>
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
                <form enctype="multipart/form-data" id="send-transaccion" action="javascript:void(0)">
                    <div class="form-group">
                        <select class="form-control" id="select_reporte" name="select_reporte">
                            <option value="">Seleccione el modo de reporte de su transaccion</option>
                            <option value="1">Por Nro. Operacion</option>
                            <option value="2">Adjuntar voucher</option>
                        </select>
                    </div>
                    <input type="hidden" name="transaccion" id="transaccion" value="" />

                    <div id="showMe"></div>

                    <div id="reporte-message" class="text-center"></div>

                    <div id="callback-message"></div>

                    <div class="modal-footer">
                        <button  class="btn btn-primary" type="submit" id="btn-transferencia">Enviar</button>
                    </div>
                </form>
                    
            </div>
        </div>
    </div>
</div>
@endsection

