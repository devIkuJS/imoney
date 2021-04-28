<style>
    main{
            margin-top: 25px !important;     
    }
    
    .card-header {
        background: #0274be !important;
        color: white;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
    }
    
    .form-control {
        border-radius: 8px !important;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%); 
    }
    
    .col-form-label{
        /*color:#22abf1 ; */
        color: #FFFFFF;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        
    }
    .card {
        background: transparent !important;
        border: none !important;
    }
    
    

  
    .btn-primary1 {
        background-color: #C0BEBF !important;
        color: white !important;
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
    }
    .btn-primary {
        font-weight: bold !important;
        font-family: Helvetica, sans-serif;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 40%);
        background: #0274be !important;
    }
    h5{
       /* color:#2375f0; */
       font-family: Helvetica, sans-serif !important;
    }
    h3{
        color:#2375F0;
    }
    
         
</style>
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<main>
    <div class="container-fluid">           
        <div class="row">        
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h3 class="card-title">Listado de Cuentas Bancarias</h3>    

                <div class="card-body">
                  <table id="cuentaBancaria" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                        @foreach ($lista_cuentas as $lista_cuenta)
                        <tr>

                            <td>{{ $lista_cuenta->id }}</td> 
                            <td>{{ $lista_cuenta->banco }}</td>
                            
                            <td>{{ $lista_cuenta->tipo_cuenta }}</td>
                                     
                            <td>{{ $lista_cuenta->numero_cuenta }}</td>       
                            <td>
          
                                </form>
                            </td>
                        </tr>
                        <!-- modal update -->
                       
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




    @endsection


    @section('js')
    <script>
      $(document).ready(function() {
          $('#cuentaBancaria').DataTable({
              responsive: true,
              "order": [[ 3, "asc" ]]
              
          });

      });

     
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    
@stop