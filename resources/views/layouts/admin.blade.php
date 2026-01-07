<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miGestion - eCommerce Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/admin') }}">
                            <!-- <img src="assets/images/logo/logo.png" alt="Logo" srcset=""> --> </a>
                            <h2>miGestion</h2>
                            <p>Dashboard</p>
                            
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('admin*') ? 'active' : ''}} " >
                            <a href=" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Inicio</span>
                            </a>
                        </li>

                         <li class="sidebar-item {{ request()->is('admin/rol*') ? 'active' : ''}}">
                            <a href="{{ url('/admin/roles') }}" class='sidebar-link'>
                                <i class="bi bi-shield-lock-fill"></i></i>
                                <span>Roles</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-title">Ajustes</li>
 
                        <li class="sidebar-item {{ request()->is('admin/ajuste*') ? 'active' : ''}}">
                            <a href="{{ url('/admin/ajustes') }}" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Configuracion</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Usuario</li>

                        <li class="sidebar-title has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>({{Auth::user()->name}})</span>
                            </a>

                            <ul class="sub-menu">
                                <li class="sub-menu-item">                                
                                    <a href="account-profile.html" class="sub-menu-link">Perfil</a>
                                </li>
                                 <li class="sub-menu-item">                                
                                    <a href="account-security.html" class="sub-menu-link">Seguridad</a>
                                </li>

                                <li class="sub-menu-item">
                                    <a href="{{ route('logout')}}" class="sub-menu-link">
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                                    <form id="logout-form" action="{{ route('logout')}}" method="POST" 
                                    style="display:none;">
                                        @csrf
                                        @method('POST')
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>  
                        
                <div>        
                    <ul>
                        <li class="d-none">
                            
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/admin') }}" class='sidebar-link'>
                                <i class="bi "></i>
                                <span>Cerrar Sesion</span>
                            </a>
                        </li>
                </ul>
                </div>
              <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Bienvenidos a miGestion</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

            {{--<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
            --}}
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>