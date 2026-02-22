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
    
@endsection
