@extends('layouts.admin')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @auth
                    <h2>Bienvenido: {{ Auth::user()->name }}</h2>

                    <!--  <li class="breadcrumb-item active">
                                                                        {{ Auth::user()->roles?->pluck('name')->implode(', ') ?? 'Sin rol' }}
                                                                    </li>-->
                @else
                    <h2>No autenticado</h2>
                @endauth

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Rol del Usuario</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ Auth::user()->roles->pluck('name')->implode(', ') }}</li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="margin-left: 20px">
                                Cerrar sesión
                            </button>
                        </form>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <br>

    <!-- Cards de estadisticas generales -->
    <h2>General</h2>
    <div class="row">
        @can('Ver listado de roles')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('admin.roles.index') }}">
                                    <div class="stats-icon purple mb-2">
                                        <i class=""><i class="bi bi-shield-check"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Cantidad Roles</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_roles }} roles</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('Ver listado de usuarios')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('admin.usuarios.index') }}">
                                    <div class="stats-icon purple mb-2">
                                        <i class=""><i class="bi bi-person-fill"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Cantidad Usuarios</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_usuarios }} usuarios</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('Ver listado de categorias')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('admin.categorias.index') }}">
                                    <div class="stats-icon blue">
                                        <i class=""><i class="bi bi-tags"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Cantidad Categorias</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_categorias }} categorias</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('Ver listado de productos')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('admin.productos.index') }}">
                                    <div class="stats-icon red">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Productos Registrados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_productos }} productos</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <!-- Cards de estadisticas de pedidos -->
        <h2>Pedidos</h2>
        <div class="row">
            @can('Ver listado de pedidos')
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('admin.pedidos.index') }}">
                                        <div class="stats-icon purple mb-2">
                                            <i class=""><i class="bi bi-basket3-fill"></i></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Cantidad Pedidos</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_pedidos }} pedidos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can('Ver listado de pedidos')
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('admin.pedidos.index') }}">
                                        <div class="stats-icon purple mb-2">
                                            <i class=""><i class="bi bi-basket3-fill"></i></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Pedidos Procesados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_pedidos_procesados }} pedidos</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can('Ver listado de pedidos')
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('admin.pedidos.index') }}">
                                        <div class="stats-icon purple mb-2">
                                            <i class=""><i class="bi bi-basket3-fill"></i></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Pedidos Enviados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_pedidos_enviados }} pedidos</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can('Ver listado de pedidos')
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('admin.pedidos.index') }}">
                                        <div class="stats-icon purple mb-2">
                                            <i class=""><i class="bi bi-basket3-fill"></i></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Pedidos Entregados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_pedidos_entregados }} pedidos</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Cantidad de usuarios registrados por mes</h2>
                    </div>
                    <div class="card-body">
                        <div id="chart_usuarios"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Cantidad de pedidos registrados por mes</h2>
                    </div>
                    <div class="card-body">
                        <div id="chart_pedidos"></div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Distribución de pedidos segun su estado</h2>
                    </div>
                    <div class="card-body">
                        <div id="chart_distribucion_categorias"></div>
                    </div>
                    <h2 class="card-title text-center">Total: {{ $total_pedidos }} pedido(s).</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Porcentaje de productos con stock bajo</h2>
                    </div>
                    <div class="card-body">
                        <div id="chart4"></div>
                    </div>
                    <h2 class="card-title text-center">Cant. de productos: {{ $total_productos }} articulos.</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Porcentaje de productos con stock exceso</h2>
                    </div>
                    <div class="card-body">
                        <div id="chart5"></div>
                    </div>
                    <h2 class="card-title text-center">Cant. de productos: {{ $total_productos }} articulos.</h2>
                </div>
            </div>
        </div>


        <!-- Scripts para graficos -->
        <script>
            // Grafico de líneas
            const $usuariosData = @json(array_values($usuarios_datos));
            var options_chart_usuarios = {
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                },
                series: [{
                    name: 'Usuarios',
                    data: $usuariosData,
                }],
                xaxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                }
            }
            var chartUsuarios = new ApexCharts(document.querySelector("#chart_usuarios"), options_chart_usuarios);
            chartUsuarios.render();

            // Grafico de barras
            const $pedidosData = @json(array_values($pedidos_datos));
            var options_chart_pedidos = {
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                },
                series: [{
                    name: 'Pedidos',
                    data: $pedidosData,
                }],
                xaxis: {
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                }
            }
            var chartPedidos = new ApexCharts(document.querySelector("#chart_pedidos"), options_chart_pedidos);
            chartPedidos.render();

            // Grafico de torta
            var options3 = {
                series: [{{ $total_pedidos_nuevos }}, {{ $total_pedidos_procesados }}, 1],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Pedidos Nuevos', 'Pedidos Procesados', 'Pedidos Enviados', 'Pedidos Entregados',
                    'Pedidos Completados'
                ],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart_distribucion_categorias = new ApexCharts(document.querySelector("#chart_distribucion_categorias"),
                options3);
            chart_distribucion_categorias.render();

            // Grafico Radial
            var options4 = {
                series: [{{ $stockBajoPorcentaje }}],
                chart: {
                    height: 210,
                    type: 'radialBar',
                },
                colors: ['#28a745'],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: '70%',
                        }
                    },
                },
                labels: ['Stock Bajo'],
            };

            var chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
            chart4.render();

            // Grafico Radial
            var options5 = {
                series: [{{ $stockMaxPorcentaje }}],
                chart: {
                    height: 210,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: '70%',
                        }
                    },
                },
                labels: ['Stock Exceso'],
            };

            var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
            chart5.render();
        </script>
    @endsection
