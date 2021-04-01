<div class="modal fade" id="modal-update-tipocambio-{{$tcambio->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Tipo de cambio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('admin.tipocambio.actualizar', $tcambio->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">          
                <div class="form-group">
                    <label for="compra">Compra</label>
                    <input type="text" name="compra" class="form-control" id="compra" value="{{$tcambio->compra}}">
                </div>
                <div class="form-group">
                    <label for="venta">Venta</label>
                    <input type="text" name="venta" class="form-control" id="venta" value="{{$tcambio->venta}}">
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