<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miGestion - eCommerce </title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/admin') }}">
                                <!-- <img src="assets/images/logo/logo.png" alt="Logo" srcset=""> --> </a>
                            <h2>miGestion</h2>
                            <p></p>

                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
                            <a href="{{ url('/admin') }}" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Inicio</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin/rol*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/roles') }}" class='sidebar-link'>
                                <i class="bi bi-shield-check"></i>
                                <span>Roles</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin/usuario*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/usuarios') }}" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin/categoria*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/categorias') }}" class='sidebar-link'>
                                <i class="bi bi-tags"></i>
                                <span>Categorias</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('admin/productos*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/productos') }}" class='sidebar-link'>
                                <i class="bi bi-box-seam"></i>
                                <span>Productos</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Ajustes</li>

                        <li class="sidebar-item {{ request()->is('admin/ajuste*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/ajustes') }}" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Configuracion</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-title has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>({{ Auth::user()->name }})</span>
                            </a>

                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                    <a href="account-profile.html" class="sub-menu-link">Perfil</a>
                                </li>
                                 <li class="sub-menu-item">
                                    <a href="account-security.html" class="sub-menu-link">Seguridad</a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">-->
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
                <h3>e-Commerce </h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

            {{-- <footer>
            
        </footer> --}}
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- Verifica si existe mensaje de sesion y muestra el icono y el mensaje -->
    @if (($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "{{ $icono }}",
                title: "{{ $mensaje }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

</body>

</html>
