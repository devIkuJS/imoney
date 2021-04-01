<div class="modal fade" id="modal-update-usuario-{{$usuario->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route ('admin.usuarios.actualizar', $usuario->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                   
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$usuario->name}}">
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