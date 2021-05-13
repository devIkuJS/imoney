@extends('adminlte::page')

@section('title', 'Modulo Tipos de cambio')

@section('content_header')
<h1  class="d-inline">Tipo de cambio al </h1>
<h1 class="d-inline" id="clock"></h1>


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
                    <h3 class="card-title">Listado de Tipo de cambio</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tabla-cambio" class="table table-bordered table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Compra</th>
                            <th>Venta</th>
                            <th>Fecha actualizacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipocambio as $tcambio)
                        <tr>
                            <td>{{ $tcambio->id }}</td>
                            <td>{{ $tcambio->compra }}</td>
                            <td>{{ $tcambio->venta }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($tcambio->updated_at)) }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-tipocambio-{{$tcambio->id}}">Actualizar</button>
                            </td>
                        </tr>
                        <!-- modal update -->
                        @include('admin.tipocambio.modal-update-tipocambio')
                        <!-- /.modal update-->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Compra</th>
                            <th>Venta</th>
                            <th>Fecha actualizacion</th>
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
    $('#tabla-cambio').DataTable( {
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
} );



// 24 hour clock  
setInterval(function() {

var currentTime = new Date();

var today = currentTime.toLocaleDateString();
var hours = currentTime.getHours();
var minutes = currentTime.getMinutes();
var seconds = currentTime.getSeconds();

hours = (hours < 10 ? "0" : "") + hours;
minutes = (minutes < 10 ? "0" : "") + minutes;
seconds = (seconds < 10 ? "0" : "") + seconds;

// Compose the string for display
var currentTimeString = today + " " + hours + ":" + minutes + ":" + seconds;
$("#clock").html(currentTimeString);

}, 200);




$('#click-tcambio').click(function() {

var id = $('#tcambio').val()

$.ajax({
type: "POST",
url:`/admin/tipocambio/${id}/actualizar`,
async: true,
cache: false,
data: { 
compra: $('#compra').val(),
venta: $('#venta').val(),
_token:"{{ csrf_token() }}",
},
success: function (data) {
$("#click-tcambio").attr("disabled", true);
$('#success-message').html('<div class="alert alert-success text-center">Tipo de cambio actualizado</div>');
 setTimeout(() => {

$("#modal-update-tipocambio").modal('hide');
window.location.reload();

},  3000);


},
error: function (err) {
   console.log(err);

},
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
