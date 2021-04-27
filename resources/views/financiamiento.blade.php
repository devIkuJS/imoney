@extends('adminlte::page')

@section('title', 'Modulo cuentaBancaria')

@section('content_header')
<h1>
    Cuentas Bancarias
</h1>
@stop

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
                <table id="cuentaBancaria" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Banco</th>
                            <th>Tipo de Cuenta</th>
                            <th>Categoria de Cuenta</th>
                            <th>Número de Cuenta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentaBancaria as $cuenta)
                        <tr>
                            <td>{{ $cuenta->id }}</td>
                            <td>{{ $cuenta->usuario }}</td>
                            <td>{{ $cuenta->banco }}</td>
                            <td>{{ $cuenta->cuenta_soles }}</td>
                            <td>{{ $cuenta->cuenta_dolares }}</td>
                            
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-cuentaBancaria-{{$user->id}}">Editar</button>
                                <form action="{{ route ('cuentaBancaria.eliminar', $user->id) }}" class="d-inline" method="post">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                    
                                </form>
                            </td>
                        </tr>
                        <!-- modal update -->
                        @include('cuentaBancaria.modal-update-cuentaBancaria')
                        <!-- /.modal update-->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Banco</th>
                            <th>Tipo de Cuenta</th>
                            <th>Categoria de Cuenta</th>
                            <th>Número de Cuenta</th>
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
    $('#cuentaBancaria').DataTable({
        responsive: true,
        "order": [[ 3, "asc" ]]
        
    });

});
</script>
@stop