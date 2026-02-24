<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miGestion - eCommerce</title>

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
                            <a href="{{ url('/admin') }}"></a>
                            <h2>miGestion</h2>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block">
                                <i class="bi bi-x bi-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-title">Menu Administrador</li>

                        @can('Ver dashboard de admin')
                            <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
                                <a href="{{ url('/admin') }}" class="sidebar-link">
                                    <i class="bi bi-house-fill"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                        @endcan

                        @can('Ver listado de roles')
                            <li class="sidebar-item {{ request()->is('admin/rol*') ? 'active' : '' }}">
                                <a href="{{ url('/admin/roles') }}" class="sidebar-link">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Roles</span>
                                </a>
                            </li>
                        @endcan

                        @can('Ver listado de usuarios')
                            <li class="sidebar-item {{ request()->is('admin/usuario*') ? 'active' : '' }}">
                                <a href="{{ url('/admin/usuarios') }}" class="sidebar-link">
                                    <i class="bi bi-person-fill"></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>
                        @endcan

                        @can('Ver listado de categorias')
                            <li class="sidebar-item {{ request()->is('admin/categoria*') ? 'active' : '' }}">
                                <a href="{{ url('/admin/categorias') }}" class="sidebar-link">
                                    <i class="bi bi-tags"></i>
                                    <span>Categorias</span>
                                </a>
                            </li>
                        @endcan

                        @can('Ver listado de productos')
                            <li class="sidebar-item {{ request()->is('admin/productos*') ? 'active' : '' }}">
                                <a href="{{ url('/admin/productos') }}" class="sidebar-link">
                                    <i class="bi bi-box-seam"></i>
                                    <span>Productos</span>
                                </a>
                            </li>
                        @endcan

                        @can('Ver listado de pedidos')
                            <li class="sidebar-item {{ request()->is('admin/pedidos*') ? 'active' : '' }}">
                                <a href="{{ url('/admin/pedidos') }}" class="sidebar-link">
                                    <i class="bi bi-card-checklist"></i>
                                    <span>Pedidos</span>
                                </a>
                            </li>
                        @endcan

                        <li class="sidebar-title">Ajustes del Sistema</li>

                        <li class="sidebar-item {{ request()->is('admin/ajuste*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/ajustes') }}" class="sidebar-link">
                                <i class="bi bi-gear-fill"></i>
                                <span>Configuracion</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Perfil de Usuario</li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-person-circle"></i>
                                <span>({{ Auth::user()->name }})</span>
                            </a>

                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="{{ route('admin.usuarios.perfil', Auth::user()->id) }}"
                                        class="submenu-link">Perfil</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="#" class="submenu-link">Seguridad</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{ route('logout') }}" class="submenu-link"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- CONTENIDO -->
        <div id="main">

            <!-- 🔥 NAVBAR AGREGADA PARA QUE main.js NO ROMPA -->
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </div>
            </nav>

            <div class="page-heading">
                <h3>e-Commerce</h3>
            </div>

            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <!-- <script src="{{-- asset('assets/js/pages/dashboard.js') --}}"></script> -->
    <!-- <script src="{{-- asset('assets/js/main.js') --}}"></script> -->

    @if (($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <!-- 🔥 MEJORAR ESTE CSS sacarlo de aqui y ponerlo en un archivo css -->
    <style>
        .submenu {
            display: none;
            padding-left: 20px;
        }

        .sidebar-item.active .submenu {
            display: block;
        }
    </style>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const submenuTriggers = document.querySelectorAll(".sidebar-item.has-sub > a");

            submenuTriggers.forEach(function(trigger) {
                trigger.addEventListener("click", function(e) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    parent.classList.toggle("active");
                });
            });

        });
    </script>
</body>

</html>
