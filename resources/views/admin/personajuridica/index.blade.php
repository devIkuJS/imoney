@extends('adminlte::page')

@section('title', 'Modulo Persona Juridica')

@section('content_header')
<h1>
    Persona Juridica
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
                    <h3 class="card-title">Listado de Personas Juridicas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="persona-juridica" class="table table-bordered table-striped" style="width:100%">
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
                            <th>Empresa</th>
                            <th>Vigencia de Poder</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personaJuridica as $juridica)
                        <tr>
                            <td>{{ $juridica->id }}</td>
                            <td>{{ $juridica->name }}</td>
                            <td>{{ $juridica->apellidos }}</td>
                            <td>{{ $juridica->email }}</td>
                            <td>{{ $juridica->dni }}</td>
                            <td>{{ $juridica->celular }}</td>
                            <td>{{ $juridica->domicilio }}</td>
                            <td>{{ $juridica->nacionalidad }}</td>
                            <td>{{ $juridica->ocupacion }}</td>
                            <td>{{ $juridica->politico ? 'Si' : 'No'  }}</td>
                            <td>{{ $juridica->cargo }}</td>
                            <td>{{ $juridica->empresa }}</td>
                            <td>{{ $juridica->rol }}</td>
                            <td>{{ $juridica->razon_social }}</td>
                            <td>
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-update-juridica-{{$juridica->id}}">Ver Vigencia de Poder</button>  
                            </td>

                        </tr>
                        <!-- modal ver vigencia -->
                        @include('admin.personaJuridica.modal-ver-vigencia')
                        <!-- modal ver vigencia -->
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
                            <th>Empresa</th>
                            <th>Vigencia de Poder</th>
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
    $('#persona-juridica').DataTable({
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