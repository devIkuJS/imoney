<div class="modal fade" id="modal-update-estado-transaccion-{{$operacion->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Transaccion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('admin.operaciones.actualizar', $operacion->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">          
                <div class="form-group">
                    <select class="form-control" id="estado_transaccion" name="estado_transaccion">
                        <option value="">Seleccione el estado</option>
                        @foreach ($estado_transaccion as $es)
                        <option value="{{$es->id}}">{{$es->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save changes</button>
            </div>
            </form>
            
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>