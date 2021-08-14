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
                    <h3 class="card-title">Listado de Financiamiento Persona Natural</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabla-empresa" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Usuario</th>
                                <th>Factura</th>
                                <th>Copia Literal</th>
                                <th>Cotizacion</th>
                                <th>Ficha RUC cliente</th>
                                <th>Ficha RUC inmobiliario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($financiamientoEmpresa as $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->user_name }}</td>
                                <td>{{ $empresa->factura }}</td>
                                <td>{{ $empresa->copia_literal }}</td>
                                <td>{{ $empresa->cotizacion }}</td>
                                <td>{{ $empresa->ficha_cliente }}</td>
                                <td>{{ $empresa->ficha_inmobiliario }}</td>
                            </tr>
                            <!-- modal ver imagen -->
                            @include('admin.financiamientoEmpresa.modal-ver-imagen-empresa')
                            <!-- /.modal ver imagen -->
                            @endforeach
                        </tbody> 
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Usuario</th>
                                <th>Factura</th>
                                <th>Copia Literal</th>
                                <th>Cotizacion</th>
                                <th>Ficha RUC cliente</th>
                                <th>Ficha RUC inmobiliario</th>
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
    $('#tabla-empresa').DataTable({
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