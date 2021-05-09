<style>
    main{
            margin-top: 25px !important;     
    }
    
    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%); 
    }
    
    /*.card {
        background: transparent !important;
        border: none !important;
    }*/
    
    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        /*background: #0274be !important;*/
    }
  
         
</style>
@extends('layouts.app')

@section('css')
        <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">-->
        <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content_header')
<h1>
    Cuentas Bancarias
</h1>
@stop
@section('content')
<main>

    <div class="container-fluid">           
        <div class="row">        
            <div class="col-md-12 mx-auto">
                <div class="card" >
                    <div class="card-header">
                        <h3 class="card-title text-black font-weight-bold">Listado de Cuentas Bancarias</h3>
                    </div>
        
                    <h1>
                    <!--Cuentas-->
                    <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                            data-target="#modal-crear-cuenta"><i class="fa fa-plus-circle pr-2"></i>Crear cuenta
                     </button>
                    </h1>   
                <div class="card-body">
                  <table id="cuentaBancaria" class="table table-striped table-bordered shadow-lg mt-4 dt-responsive nowrap" style="width:100%">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th>ID</th>
                            <th>Banco</th>
                            <th>Tipo de Cuenta</th>
                            <th>Categoria de Cuenta</th>
                            <th>Número de Cuenta</th>
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
                            <td>
          
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-cuentaBancaria-{{$cuentaBancaria->id}}">Editar</button>
                                <form action="{{ route ('cuentaBancaria.eliminar', $cuentaBancaria->id) }}" class="d-inline" method="post">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                    
                                </form>
                            </td>
                        </tr>
                        <!-- modal update -->
                        @include('modal-update-cuentaBancaria')
                        <!-- /.modal update-->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            
                        </tr>
                    </tfoot>
                  </table>
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
                    <select class="form-control" id="cuenta_bancaria_user" name="cuenta_bancaria_user">
                        <option value="">Seleccione el banco</option>
                        @foreach ($bancos as $banco)
                        <option value="{{$banco->id}}">{{$banco->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="tipo_cuenta" name="tipo_cuenta">
                        <option value="">Seleccione el tipo de cuenta</option>
                        @foreach ($tipo_cuenta as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero_cuenta">Numero de cuenta</label>
                    <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta">
                </div>
                <div class="form-group">
                    <select class="form-control" id="categoria_cuenta" name="categoria_cuenta">
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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>       
    <scrip src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!--<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>-->

    <script>    
        $(document).ready(function() {
            $.noConflict();
            $('#cuentaBancaria').DataTable({   
              responsive: true,
              autoWidth:false,
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
        },
              "order": [[ 3, "asc" ]]          
            });
        });
   
    </script>
    
    @endsection