<style>
    main {
        margin-top: 25px !important;
    }

    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }


    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }
    .btn-primary1{
        background-color: #C0BEBF !important;
    }
   /* div.container { max-width: 1200px } */
</style>
@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<main>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-black font-weight-bold">Listado de Cuentas Bancarias</h3>
                    </div>

                    <div class="mt-3">
                        <!--Cuentas-->
                        <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                            data-target="#modal-crear-cuenta"><i class="fa fa-plus-circle pr-2"></i>Crear cuenta
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="cuentaBancaria"
                            class="table table-striped table-bordered shadow-lg display nowrap"
                            style="width:100%">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Banco</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>Categoria de Cuenta</th>
                                    <th>Número de Cuenta</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lista_cuentas as $cuentaBancaria)
                                <tr class="text-center">
                                    <td>{{ $cuentaBancaria->id }}</td>
                                    <td>{{ $cuentaBancaria->banco }}</td>
                                    <td>{{ $cuentaBancaria->tipo }}</td>
                                    <td>{{ $cuentaBancaria->categoria }}</td>
                                    <td>{{ $cuentaBancaria->numero_cuenta }}</td>
                                    <td>{{ $cuentaBancaria->estado === '1' ? 'Activo' : 'Desactivo'  }}</td>
                                    <td>
                                        @if($cuentaBancaria->estado === '1')
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#modal-update-cuentaBancaria-{{$cuentaBancaria->id}}">Editar</button>
                                        <form action="{{ route ('cuentaBancaria.cambiarEstado', $cuentaBancaria->id) }}"
                                            class="d-inline" method="post">
                                            {{ csrf_field() }}
                                            @method('POST')
                                            <button class="btn btn-danger">Desactivar</button>

                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                <!-- modal update -->
                                @include('modal-update-cuentaBancaria')
                                <!-- /.modal update-->
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center col-md-12 mt-4">
                            <a class="btn btn-primary1 btn-regresar mr-3 font-weight-bold text-white" href="{{ route('user') }}">Atrás</a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</main>

<!-- Modal Agregar Cuenta -->
<div class="modal fade" id="modal-crear-cuenta" tabindex="-1" role="dialog" aria-labelledby="modal-crear-cuenta"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modal-crear-cuenta">Crear nueva cuenta
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cuentaBancaria.registro') }}" method="POST">
                {{ csrf_field() }}
                <p class="text-center font-weight-bold mt-3" style="color:#2a3253;font-size: 17px;"></p>
                <div class="modal-body">

                    <div class="form-group">
                        <select class="form-control"  name="cuenta_bancaria_user">
                            <option value="">Seleccione el banco</option>
                            @foreach ($bancos as $banco)
                            <option value="{{$banco->id}}">{{$banco->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control"  name="tipo_cuenta">
                            <option value="">Seleccione el tipo de cuenta</option>
                            @foreach ($tipo_cuenta as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero_cuenta">Numero de cuenta</label>
                        <input type="text" class="form-control"  name="numero_cuenta">
                    </div>
                    <div class="form-group">
                        <select class="form-control"  name="categoria_cuenta">
                            <option value="">Seleccione la categoria de la cuenta</option>
                            @foreach ($categoria_cuenta as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="success-message"></div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="crear-tipo-cuenta">Agregar</button>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Modal Agregar Cuenta -->


@endsection

@section('js')
<script>
    $(document).ready(function() {
            $.noConflict();
         $('#cuentaBancaria').DataTable({ 
  
              responsive: true,
              autoWidth:false,
              /*"aaSorting": [[ 0, "asc" ]],*/
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

@endsection