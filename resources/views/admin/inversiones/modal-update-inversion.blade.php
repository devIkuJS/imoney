<div class="modal fade" id="modal-update-inversion-{{$inversion->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Empresa inversionista</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('admin.inversiones.actualizar', $inversion->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">         
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" value="{{$inversion->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="numero_ruc">Número RUC</label>
                            <input type="text" name="numero_ruc" class="form-control" id="numero_ruc" value="{{$inversion->numero_ruc}}">
                        </div>
                        <div class="form-group">
                            <label for="informe">Informe</label>
                            <input type="file" class="form-control-file" name="informe" accept="application/pdf">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control-file" name="logo"
                                accept="image/jpeg,image/png,image/x-eps">
                        </div>
                        <div class="form-group">
                            <label for="monto_disponible">Monto Disponible</label>
                            <input type="text" class="form-control" name="monto_disponible" id="monto_disponible" value="{{$inversion->monto_disponible}}">
                        </div>
                        <div class="form-group">
                            <label for="monto_total">Monto Total</label>
                            <input type="text" class="form-control" name="monto_total" id="monto_total" value="{{$inversion->monto_total}}">
                        </div>
                        <div class="form-group">
                            <label for="tasa_anual">Tasa Anual(%)</label>
                            <input type="text" class="form-control" name="tasa_anual" id="tasa_anual" value="{{$inversion->tasa_anual}}">
                        </div>
                        <div class="form-group">
                            <label for="tasa_mensual">Tasa Mensual(%)</label>
                            <input type="text" class="form-control" name="tasa_mensual" id="tasa_mensual" value="{{$inversion->tasa_mensual}}">
                        </div>
                        <div class="form-group">
                            <div class="form-group row">
                                    <label for="fecha_esperada" class="col-md-4 col-form-label text-md-left">Fecha
                                        Esperada</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="fecha_esperada" id="fecha_esperada" value="{{$inversion->fecha_esperada}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="serie_num_comprobante">Código de documento</label>
                            <input type="text" class="form-control" name="serie_num_comprobante" id="serie_num_comprobante" value="{{$inversion->serie_num_comprobante}}">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
                        </div>
                    </div>
                </form>        
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('js')

@stop