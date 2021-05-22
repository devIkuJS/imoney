<style>
    .custom-file-label::after {
        content: "Adjuntar" !important;
    }
</style>
@extends('adminlte::page')

@section('title', 'Modulo Empresas Inversionistas')

@section('content_header')
<h1>
    Empresas Inversionistas
</h1>
@stop

@section('css')
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Empresas Inversionistas</h3>
                </div>

                <div class="mt-3">
                    <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                        data-target="#modal-crear-cuenta"><i class="fa fa-plus-circle pr-2"></i>Crear nueva empresa
                        inversionista
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="empresa_inversiones" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Informe</th>
                                <th>Logo</th>
                                <th>Monto Disponible</th>
                                <th>Fecha Esperada</th>
                                <th>Moneda Inversion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inversiones as $inversion)
                            <tr>
                                <td>{{ $inversion->id }}</td>
                                <td>{{ $inversion->nombre }}</td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#modal-ver-informe-{{$inversion->id}}">Ver informe</button></td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#modal-ver-logo-{{$inversion->id}}">Ver logo</button></td>
                                <td>{{ $inversion->monto_disponible }}</td>
                                <td>{{ date('d-m-Y', strtotime($inversion->fecha_esperada )) }}</td>
                                <td>{{ $inversion->moneda_inversion === '1' ? 'Soles' : 'Dolares'  }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modal-update-inversion-{{$inversion->id}}">Editar</button>
                                    <form action="{{ route ('admin.inversiones.eliminar', $inversion->id) }}"
                                        class="d-inline" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal update -->
                            @include('admin.inversiones.modal-update-inversiones')
                            <!-- /.modal update-->
                            <!-- modal ver informe -->
                            @include('admin.inversiones.modal-ver-informe')
                            <!-- /.modal ver informe-->
                            <!-- modal ver logo -->
                            @include('admin.inversiones.modal-ver-logo')
                            <!-- /.modal ver logo-->
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Informe</th>
                                <th>Logo</th>
                                <th>Monto Disponible</th>
                                <th>Fecha Esperada</th>
                                <th>Moneda Inversion</th>
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
            <form action="{{ route('admin.inversiones.registro') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p class="text-center font-weight-bold mt-3" style="color:#2a3253;font-size: 17px;"></p>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Empresa</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>

                        <div class="form-group">
                            <label for="informe">Informe</label>
                            <input type="file" class="form-control-file" name="informe_doc" accept="application/pdf">
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control-file" name="logo"
                                accept="image/jpeg,image/png,image/x-eps">
                        </div>

                    <div class="form-group">
                        <label for="monto_disponible">Monto Disponible</label>
                        <input type="text" class="form-control" name="monto_disponible" name="monto_disponible" />
                    </div>
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="fecha_esperada" class="col-md-4 col-form-label text-md-left">Fecha
                                Esperada</label>
                            <div class="col-md-12">
                                <input class="form-control" type="date" name="fecha_esperada" id="fecha_esperada">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="moneda_inversion" name="moneda_inversion">
                            <option value="">Moneda Inversion</option>
                            @foreach ($moneda_inversion as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#empresa_inversiones').DataTable({
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
    } );
});
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

@stop