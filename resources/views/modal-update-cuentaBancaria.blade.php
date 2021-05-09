<div class="modal fade" id="modal-update-cuentaBancaria-{{$cuentaBancaria->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cuenta Bancaria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('cuentaBancaria.actualizar', $cuentaBancaria->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                   
                <div class="form-group">
                    <label for="nombre">Número de Cuenta</label>
                    <input type="text" name="numero_cuenta" class="form-control" id="numero_cuenta" value="{{$cuentaBancaria->numero_cuenta}}">
                </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
            </div>
                </form>
            
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>