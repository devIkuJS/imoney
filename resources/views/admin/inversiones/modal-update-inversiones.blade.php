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
                            <div class="form-group row">
                                <label for="ficha_ruc_emp" class="col-md-4 col-form-label text-md-left">Informe</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="ruc-file-input" name="ruc_doc" id="ruc-id"
                                                        aria-describedby="ruc-id"
                                                        accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                <label class="custom-file-label" for="ruc-id">
                                                </label>
                                            </div>
                                        </div>
                                            @if ($errors->has('ruc_doc'))
                                                <span class="text-danger">{{ $errors->first('ruc_doc') }}</span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-left">logo</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="logo-file-input" name="logo" id="logo"
                                                    aria-describedby="logo"
                                                    accept="image/jpeg,image/png,application/pdf,image/x-eps">
                                                <label class="custom-file-label" for="logo"></label>
                                            </div>
                                        </div>
                                            @if ($errors->has('logo'))
                                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="monto_disponible">Monto Disponible</label>
                            <input type="text" class="form-control" name="monto_disponible" name="monto_disponible" value="{{$inversion->monto_disponible}}"/>
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
<script>

document.querySelector('.logo-file-input').addEventListener('change',function(e){ 
  var fileName = document.getElementById("logo").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})

document.querySelector('.ruc-file-input').addEventListener('change',function(e){ 
  var fileName = document.getElementById("ruc-id").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>
@stop