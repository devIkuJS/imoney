<div class="modal fade" id="modal-update-empresaInversionista-{{$empresaInversionista->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Empresa inversionista</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('admin.inversiones.actualizar', $empresaInversionista->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">         
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" value="{{$empresaInversionista->nombre}}">
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
                            <label for="monto_total">Monto Total</label>
                            <input type="text" class="form-control" name="monto_total" value="{{$empresaInversionista->monto_total}}">
                        </div>
                        <div class="form-group">
                            <div class="form-group row">
                                    <label for="fecha_esperada" class="col-md-4 col-form-label text-md-left">Fecha
                                        Esperada</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="fecha_esperada" id="fecha_esperada" value="{{$empresaInversionista->fecha_esperada}}">
                                </div>
                            </div>
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