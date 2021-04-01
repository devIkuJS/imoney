@extends('adminlte::page')

@section('title', 'Modulo Empresas')

@section('content_header')
<h1>
    Empresas
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Empresas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="empresas" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Razon social</th>
                                <th>RUC</th>
                                <th>Actividad economica</th>
                                <th>Grupo economico?</th>
                                <th>Nombre grupo economico</th>
                                <th>Telefono</th>
                                <th>Direccion fiscal</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Ficha RUC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->razon_social }}</td>
                                <td>{{ $empresa->numero_ruc }}</td>
                                <td>{{ $empresa->actividad_economica }}</td>
                                <td>{{ $empresa->politico ? 'Si' : 'No' }}</td>
                                <td>{{ $empresa->grupo_economico }}</td>
                                <td>{{ $empresa->telefono_fijo }}</td>
                                <td>{{ $empresa->direccion_fiscal }}</td>
                                <td>{{ $empresa->departamento }}</td>
                                <td>{{ $empresa->provincia  }}</td>
                                <td>{{ $empresa->distrito }}</td>
                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-ver-imagen-{{$empresa->id}}">Ver ficha RUC</button></td>
                            </tr>
                            <!-- modal ver imagen -->
                            @include('admin.empresas.modal-ver-imagen')
                            <!-- /.modal ver imagen -->
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Razon social</th>
                                <th>RUC</th>
                                <th>Actividad economica</th>
                                <th>Grupo economico?</th>
                                <th>Nombre grupo economico</th>
                                <th>Telefono</th>
                                <th>Direccion fiscal</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Ficha RUC</th>
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
    $('#empresas').DataTable({
        responsive: true,
        "order": [[ 3, "asc" ]]
        
    });

});
</script>
@stop