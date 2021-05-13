@extends('adminlte::page')

@section('title', 'Modulo Operaciones')

@section('content_header')
<h1>
    Operaciones
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
                    <h3 class="card-title">Operaciones</h3>
                </div>
                <!-- card-header -->
                <div class="card-body">
                    <table id="operaciones" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nro Orden</th>
                                <th>Usuario</th>
                                <th>Banco de Origen</th>
                                <th>Monto Enviado</th>
                                <th>Banco de destino</th>
                                <th>Monto a Recibir</th>
                                <th>Estado de transaccion</th>
                                <th>Fecha de transaccion</th>
                                <th>Fecha de Actualiz. de transaccion</th>
                                <th>Nro Operacion</th>
                                <th>Voucher de operacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operaciones as $operacion)
                            <tr>
                                <td>{{ $operacion->id }}</td>
                                <td>{{ $operacion->nro_orden }}</td>
                                <td>{{ $operacion->nombre_usuario }} {{ $operacion->apellido_usuario }}</td>
                                <td>{{ $operacion->banco_origen }}</td>
                                <td>{{ $operacion->montoA }} {{ $operacion->descripcionMontoA }}</td>
                                <td>{{ $operacion->banco_destino}} {{ $operacion->numero_cuenta}} {{ $operacion->tipo_cuenta}}</td>
                                <td>{{ $operacion->montoB }} {{ $operacion->descripcionMontoB }}</td>
                                <td>{{ $operacion->estado }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($operacion->created_at)) }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($operacion->updated_at)) }}</td>
                                <td>{{ $operacion->nro_operacion }}</td>
                                @if($operacion->voucher)
                                <td>
                                    <button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#modal-ver-voucher-{{$operacion->id_voucher}}">Ver voucher</button>
                                </td>
                                @else
                                <td>&nbsp;</td>
                                @endif
                                @include('admin.operaciones.modal-ver-voucher')
                                @if($operacion->estado_id === 2)
                                <td>
                                    <button type="button" class="btn btn-warning font-weight-bold" data-toggle="modal" data-target="#modal-update-estado-transaccion-{{$operacion->id}}">Actualizar Estado</button>
                                </td>
                                @else
                                <td>&nbsp;</td>
                                @endif
                                @include('admin.operaciones.modal-update-estado-transaccion')
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nro Orden</th>
                                <th>Usuario</th>
                                <th>Banco de Origen</th>
                                <th>Monto Enviado</th>
                                <th>Banco de destino</th>
                                <th>Monto a Recibir</th>
                                <th>Estado de operacion</th>
                                <th>Fecha de operacion</th>
                                <th>Fecha de Actualizacion de Operacion</th>
                                <th>Nro Operacion</th>
                                <th>Voucher de operacion</th>
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

@stop

@section('js')
<script>
    $(document).ready(function() {
    $('#operaciones').DataTable({
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
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
@stop