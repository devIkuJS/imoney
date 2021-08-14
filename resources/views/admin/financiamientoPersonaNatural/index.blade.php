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
                    <table id="tabla-persoNatural" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Usuario</th>
                                <th>Producto o servicio</th>
                                <th>Establecimiento</th>
                                <th>Bien o servicio</th>
                                <th>Número de cuotas</th>
                                <th>Foto de perfil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($financiamientoPersonaNatural as $natural)
                            <tr>
                                <td>{{ $natural->id }}</td>
                                <td>{{ $natural->user_name }}</td>
                                <td>{{ $natural->descripcion }}</td>
                                <td>{{ $natural->establecimiento }}</td>
                                <td>{{ $natural->servicio }}</td>
                                <td>{{ $natural->numero_cuota }}</td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-imagen-{{$natural->id}}">Ver foto perfil</button></td>
                            </tr>
                            <!-- modal ver imagen -->
                            @include('admin.financiamientoPersonaNatural.modal-ver-imagen')
                            <!-- /.modal ver imagen -->
                            @endforeach
                        </tbody> 
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Usuario</th>
                                <th>Producto o servicio</th>
                                <th>Establecimiento</th>
                                <th>Bien o servicio</th>
                                <th>Número de cuotas</th>
                                <th>Foto de perfil</th>
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