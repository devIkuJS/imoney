<div class="modal fade" id="modal-update-tipocambio-{{$tcambio->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Tipo de cambio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="tcambio" id="tcambio" value="{{$tcambio->id}}">
                    <label for="compra">Compra</label>
                    <input type="text" name="compra" class="form-control" id="compra" value="{{$tcambio->compra}}" maxlength="6">
                </div>
                <div class="form-group">
                    <label for="venta">Venta</label>
                    <input type="text" name="venta" class="form-control" id="venta" value="{{$tcambio->venta}}" maxlength="6">
                </div>
                <div id="success-message"></div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button class="btn btn-outline-primary" id="click-tcambio">Save changes</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

