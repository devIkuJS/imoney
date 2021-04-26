<div class="modal fade" id="modal-update-cuentaBancaria-{{$usuario->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cuenta Bancaria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('cuentaBancaria.actualizar', $usuario->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                   
                <div class="form-group">
                    <label for="nombre">Banco</label>
                    <input type="text" name="banco" class="form-control" id="banco" value="{{$usuario->banco}}">
                </div>
                <div class="form-group">
                    <label for="nombre">Cuenta en Soles</label>
                    <input type="text" name="cuenta_soles" class="form-control" id="cuenta_soles" value="{{$usuario->cuenta_soles}}">
                </div>
                <div class="form-group">
                    <label for="nombre">Cuenta en Dólres</label>
                    <input type="text" name="cuenta_dolares" class="form-control" id="cuenta_dolares" value="{{$usuario->cuenta_dolares}}">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
            </div>
                </form>
            
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>