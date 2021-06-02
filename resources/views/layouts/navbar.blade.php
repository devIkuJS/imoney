@auth
<nav class="navbar navbar-expand-md navbar-dark bg-white fixed-left">
        <a class="navbar-brand"><img src={{asset('imagenes_sidebar/logo60.jpg')}}  width="170" class="img-fluid" style="margin-top:14px; margin-left:30px; "></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav" style="padding: 7px; margin-left:20px;">
                <li class="nav-item dropdown show" style="margin-top:25px;">
                    <a class="nav-link dropdown-toggle font-weight-bold" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" style="font-size:17px;margin-left:18px;color:black !important;">Panel de Usuario</a>
                    <div class="dropdown-menu show" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
                      <a class="dropdown-item" href="{{ route('user') }}">Menu principal</a>
                      <a class="dropdown-item" href="{{ route('tipoCambio') }}">Tipo de cambio</a>
                      <a class="dropdown-item" href="{{ route('inversionista') }}">Inversión</a>
                      <a class="dropdown-item" href="#">Financiamiento</a>
                      <a class="dropdown-item" href="{{ route('misDatos') }}">Mis datos</a>
                      <a class="dropdown-item" href="{{ route('cuentaBancaria') }}">Cuentas bancarias</a>
                      <a class="dropdown-item" href="#">Estado de cuenta</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:black !important;margin-left:15px;"><img src={{asset('imagenes_sidebar/soporte.png')}} width="15" class="mb-1 mr-2">Soporte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" style="font-size:17px;margin-left:18px;color:black !important;">&#191Necesitas ayuda?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size:17px;"><img src={{asset('imagenes_sidebar/celular.png')}} width="15" class="mb-1 mr-2" style="margin-left:5px;">(01) 748-2710</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://api.whatsapp.com/send?phone=+51982273702&text=Quiero%20mas%20informacion" target="_blank" style="font-size:17px;"><img src={{asset('imagenes_sidebar/LOGO_WSP.png')}} width="20" class="mb-1 mr-2"> 982273702</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" style="font-size:18px;margin-left:0px; color:black !important;">Horario de atenci&oacuten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size:17px; margin-left:-12px;"><img src={{asset('imagenes_sidebar/horario.png')}} width="20" class="mb-1 mr-2">Lunes a Viernes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size:17px;margin-left:14px;">9:00 am a 17:00 pm</a>
                </li>
                <li class="nav-item" style="margin-top:50px;">
                    <a class="nav-link font-weight-bold" style="font-size:18px; color:black !important;" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><img src={{asset('imagenes_sidebar/cerrar-sesion.png')}} width="20" class="mb-1 mr-2" style="margin-left:-10px;">Cerrar Sesi&oacuten</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
</nav>
@endauth
@section('custom-script')
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
    </script>
@stop