<div class="modal fade" id="modal-update-cuentaBancaria-{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cuenta Bancaria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('cuentaBancaria.actualizar', $user->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                   
                <div class="form-group">
                    <label for="nombre">Banco</label>
                    <input type="text" name="banco" class="form-control" id="banco" value="{{$user->banco}}">
                </div>
                <div class="form-group">
                    <label for="nombre">Tipo de Cuenta</label>
                    <input type="text" name="tipo_cuentas" class="form-control" id="tipo_cuentas" value="{{$user->tipo_cuentas}}">
                </div>
                <div class="form-group">
                    <label for="nombre">Cuenta en Soles</label>
                    <input type="text" name="cuenta_soles" class="form-control" id="cuenta_soles" value="{{$user->cuenta_soles}}">
                </div>
                <div class="form-group">
                    <label for="nombre">Cuenta en Dólres</label>
                    <input type="text" name="cuenta_dolares" class="form-control" id="cuenta_dolares" value="{{$user->cuenta_dolares}}">
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