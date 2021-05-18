@extends('adminlte::page')

@section('title', 'Modulo Cuentas Bancarias')

@section('content_header')
<h1>
    Cuentas bancarias
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
                    <h3 class="card-title">Listado de Cuentas Bancarias</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tabla-bancaria" class="table table-bordered table-striped" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Nombre Usuario</th>
                            <th>Apellido Usuario</th>
                            <th>DNI Usuario</th>
                            <th>Imagen DNI Usuario</th>
                            <th>Cuenta bancaria</th>
                            <th>Nombre Entidad</th>
                            <th>Moneda</th>
                            <th>Tipo cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cBancaria as $item)
                        <tr>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->user_apellido }}</td>
                                    <td>{{ $item->user_dni }}</td>
                                    <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-imagen-{{$item->user_id}}">Ver DNI</button></td>
                                    <td>{{ $item->cuenta_bancaria }}</td>
                                    <td>{{ $item->nombre_banco }}</td>
                                    <td>{{ $item->moneda }}</td>
                                    <td>{{ $item->tipo_cuenta }}</td>
                        </tr>
                        <!-- modal ver imagen -->
                        @include('admin.cuentabancaria.modal-ver-imagen')
                        <!-- /.modal ver imagen -->
                        @endforeach
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <th>Nombre Usuario</th>
                            <th>Apellido Usuario</th>
                            <th>DNI Usuario</th>
                            <th>Imagen DNI Usuario</th>
                            <th>Cuenta bancaria</th>
                            <th>Nombre Entidad</th>
                            <th>Moneda</th>
                            <th>Tipo cuenta</th>
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

@stop

@section('js')
<script>
$(document).ready(function() {
    $('#tabla-bancaria').DataTable({
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
            }).buttons().container().appendTo('#tabla-bancaria_wrapper .col-md-6:eq(0)');
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