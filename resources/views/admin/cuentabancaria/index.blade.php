@extends('adminlte::page')

@section('title', 'Modulo Cuentas Bancarias')

@section('content_header')
<h1>
    Usuarios
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
                <table id="usuarios" class="table table-bordered table-striped" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Banco</th>
                            <th>Tipo de Cuenta</th>
                            <th>Categoria de Cuenta</th>
                            <th>Número de Cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista_cuentas as $cuentaBancaria)
                        <tr>
                                    <td>{{ $cuentaBancaria->id }}</td>
                                    <td>{{ $cuentaBancaria->banco }}</td>
                                    <td>{{ $cuentaBancaria->tipo }}</td>
                                    <td>{{ $cuentaBancaria->categoria }}</td>
                                    <td>{{ $cuentaBancaria->numero_cuenta }}</td>
                            <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-dni-adelante-{{$usuario->id}}">Ver DNI</button></td>
                             <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-dni-atras-{{$usuario->id}}">Ver DNI</button></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-usuario-{{$usuario->id}}">Editar</button>
                                <form action="{{ route ('admin.usuarios.eliminar', $usuario->id) }}" class="d-inline" method="post">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                    
                                </form>
                            </td>
                        </tr>
                        <!-- modal update -->
                        @include('admin.usuarios.modal-update-usuario')
                        <!-- /.modal update-->
                        <!-- modal ver dni adelante -->
                        @include('admin.usuarios.modal-ver-dni-adelante')
                        <!-- /.modal ver dni adelante-->
                        <!-- modal ver dni atras -->
                        @include('admin.usuarios.modal-ver-dni-atras')
                        <!-- /.modal ver dni atras-->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Domicilio</th>
                            <th>Nacionalidad</th>
                            <th>Ocupacion</th>
                            <th>Pos. Politica?</th>
                            <th>Cargo</th>
                            <th>Empresa</th>
                            <th>Tipo de Usuario</th>
                            <th>DNI Adelante</th>
                            <th>DNI Atras</th>
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
    $('#usuarios').DataTable({
        responsive: true,
        autoWidth:false,
        "buttons": ["excel","pdf","print"],
        "columnsDefs":[
            { "searchable": true, "targets":1},
            { "searchable": true, "targets":2},
            { "searchable": false, "targets":3},
            { "searchable": false, "targets":4},
            { "searchable": false, "targets":5},
            { "searchable": false, "targets":6},
        ],
        "order": [[ 3, "asc" ]]
        "aaSorting": [[ 0, "asc" ]],
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
                },
        },     
            }).buttons().container().appendTo('#usuarios_wrapper .col-md-6:eq(0)');
        });
</script>
@stop