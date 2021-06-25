@extends('adminlte::page')

@section('title', 'hola')

@section('content_header')
<h1>
    hola
</h1>
@stop

@section('css')
<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Empresas Inversionistas</h3>
                </div>
                <!-- card-header -->
                <div class="mt-3">
                    <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                        data-target="#modal-crear-cuenta"><i class="fa fa-plus-circle pr-2"></i>Crear nueva empresa
                        inversionista
                    </button>
                </div>

                <div class="card-body">
                    <table id="emp_inversionista" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresasInversionistas as $empresaInversionista)
                            <tr>
                                <td>{{ $empresaInversionista->id }}</td>
                                <td>{{ $empresaInversionista->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modal-update-empresaInversionista-{{$empresaInversionista->id}}">Editar</button>
                                    <form action="{{ route ('admin.empresasInversionistas.eliminar', $empresaInversionista->id) }}"
                                        class="d-inline" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal - UPDATE CATEGORY -->
                            @include('admin.empresasInversionistas.modal-update-empresasInversionistas')
                            <!-- /.modal -->
                            @endforeach                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- Modal Agregar empresa inversionista -->
<div class="modal fade" id="modal-crear-cuenta" tabindex="-1" role="dialog" aria-labelledby="modal-crear-cuenta"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modal-crear-cuenta">Crear nueva empresa inversionista
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.empresasInversionistas.registro') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Empresa</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                   
                </div>
                <div id="success-message"></div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="crear-tipo-cuenta">Agregar</button>
                </div>   
            </form>
        </div>
    </div>
</div>

<!-- Modal Agregar empresa inversionista -->
@stop

@section('js')
<script>
    $(document).ready(function() {
    $('#emp_inversionista').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        responsive: true,
        autoWidth:false,
        "order": [[ 3, "desc" ]],
        "language": {
              "lengthMenu": "Mostrar _MENU_ registros por páginas",
              "zeroRecords": "Nada encontrado - disculpa",
              "info": "Mostrando la página _PAGE_ de _PAGES_",
              "infoEmpty": "No records available",
              "infoFiltered": "(filtrado de _MAX_ total registros totales)",
              "search": "Buscar:",
              "paginate": {
              "next": "Siguiente",
              "previous": "Anterior"
                }
        }
    });
});
</script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

@endsection