@extends('adminlte::page')

@section('title', 'Modulo Financiamiento Persona Natural')

@section('content_header')
<h1>
    Financiamiento Persona Natural
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
                    <h3 class="card-title">Listado de Estados de Cuentas</h3>
                </div>
                <!-- /.card-header -->
                <div class="mt-3">
                        <!--Cuentas-->
                        <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                            data-target="#modal-crear-cuenta"><i class="fa fa-plus-circle pr-2"></i>Crear estado de cuenta cuenta
                        </button>
                </div>
                <div class="card-body">
                    <table id="tabla-persoNatural" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Usuario</th>
                                <th>Documento</th>
                                <th>Original</th>
                                <th>Razon Social</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estadoCuenta as $estado)
                            <tr>
                                <td>{{ $estado->id }}</td>
                                <td>{{ $estado->numero_ruc }}</td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-documento-{{$estado->id}}">Ver documento</button></td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-imagen-{{$estado->id}}">Ver Logo</button></td>
                                <td>{{ $estado->razon_social}}</td>
                            </tr>
                            <!-- modal ver imagen -->
                            @include('admin.estadoCuenta.modal-ver-documento')  
                            <!-- /.modal ver imagen -->
                            @include('admin.estadoCuenta.modal-ver-imagen')  
                            @endforeach
                        </tbody> 
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Usuario</th>
                                <th>Documento</th>
                                <th>Original</th>
                                <th>Razon Social</th>
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
<!-- Modal Agregar Cuenta -->
<div class="modal fade" id="modal-crear-cuenta" tabindex="-1" role="dialog" aria-labelledby="modal-crear-cuenta"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modal-crear-cuenta">Crear nueva cuenta
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.estadoCuenta.create') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p class="text-center font-weight-bold mt-3" style="color:#2a3253;font-size: 17px;"></p>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="numero_ruc">Nombre</label>
                        <input type="text" class="form-control" name="numero_ruc">
                    </div>
                    <div class="form-group">
                        <label for="documento">Documento</label>
                        <input type="file" class="form-control-file" name="documento" accept="application/pdf">
                    </div>
                    <div class="form-group">
                        <label for="original">Logo</label>
                        <input type="file" class="form-control-file" name="original"
                            accept="image/jpeg,image/png,image/x-eps">
                    </div>
                    <div class="form-group">
                        <label for="razon_social">Nombre</label>
                        <input type="text" class="form-control" name="razon_social">
                    </div>
                    <div id="success-message"></div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="crear-tipo-cuenta">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Agregar Cuenta -->	
@stop

@section('js')
<script>
    $(document).ready(function() {
    $('#tabla-persoNatural').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        responsive: true,
        autoWidth:false,
        "order": [[ 3, "asc" ]],
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
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

@stop