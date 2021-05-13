@extends('adminlte::page')

@section('title', 'Modulo Usuario')

@section('content_header')
<h1>
    Usuarios
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
                    <h3 class="card-title">Listado de Usuarios</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="usuarios" class="table table-bordered table-striped" style="width:100%">
                    <thead class="bg-primary text-white">
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