@extends('adminlte::page')

@section('title', 'Modulo Usuario')

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
                    <h3 class="card-title">Listado de Usuarios</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="usuarios" class="table table-bordered table-striped" style="width:100%">
                    <thead>
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->apellidos }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->dni }}</td>
                            <td>{{ $usuario->celular }}</td>
                            <td>{{ $usuario->domicilio }}</td>
                            <td>{{ $usuario->nacionalidad }}</td>
                            <td>{{ $usuario->ocupacion }}</td>
                            <td>{{ $usuario->politico ? 'Si' : 'No'  }}</td>
                            <td>{{ $usuario->cargo }}</td>
                            <td>{{ $usuario->empresa }}</td>
                            <td>{{ $usuario->rol }}</td>
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
                            <th>Posicion Politica?</th>
                            <th>Cargo</th>
                            <th>Empresa</th>
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
        "order": [[ 3, "asc" ]]
        
    });

});
</script>
@stop