@extends('adminlte::page')

@section('title', 'Modulo Tipos de cambio')

@section('content_header')
<h1  class="d-inline">Tipo de cambio al </h1>
<h1 class="d-inline" id="clock"></h1>


@stop

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
                <table id="tcambio" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Compra</th>
                            <th>Venta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipocambio as $tcambio)
                        <tr>
                            <td>{{ $tcambio->id }}</td>
                            <td>{{ $tcambio->compra }}</td>
                            <td>{{ $tcambio->venta }}</td>
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
    $('#tcambio').DataTable( {
        "order": [[ 3, "desc" ]]
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

</script>
@stop