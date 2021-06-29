<div class="modal fade" id="modal-ver-vigencia-poder-{{$juridica->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Vigencia de Poder</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{asset($juridica->archivo_vigencia)}}" width="450" height="500" alt="pdf" />
                <img src="{{asset($juridica->archivo_vigencia)}}" alt="{{$juridica->name}}" class="img-fluid" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>