<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Imoney</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('css')
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imoney.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar-fixed-left.min.css') }}" rel="stylesheet">
    
</head>
<style>
@media (max-width: 575.98px) {
        .img-fluid {
            width: 149px ;
        }
    }

</style>
<body class="background-imoney">
<div id="app">
    @if (Auth::check())
    <nav class="navbar navbar-expand-md navbar-dark bg-white fixed-left">
        <a class="navbar-brand"><img src={{asset('imagenes_sidebar/logo60.jpg')}}  width="170" class="img-fluid" style="margin-top:14px; margin-left:30px; "></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav" style="padding: 7px; margin-left:20px;">
                <li class="nav-item dropdown" style="margin-top:25px;">
                    <a class="nav-link dropdown-toggle font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:black !important;margin-left:15px;"><img src={{asset('imagenes_sidebar/soporte.png')}} width="15" class="mb-1 mr-2">Soporte</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item">Action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">Separated link</a>
                    </div>
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

     @endif
     @yield('content')
 <!--   <main class="py-4">
        
    </main>
-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@yield('custom-script')

<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
