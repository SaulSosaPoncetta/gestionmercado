@extends('layouts.admin')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @auth
                    <h2>Bienvenido: {{ Auth::user()->name }}</h2>

                    <li class="breadcrumb-item active">
                        {{ Auth::user()->roles?->pluck('name')->implode(', ') ?? 'Sin rol' }}
                    </li>
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
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Cantidad Roles</h6>
                        <h6 class="font-extrabold mb-0">{{ $total_roles }} roles</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Usuarios Registrados</h6>
                            <h6 class="font-extrabold mb-0">{{ $total_usuarios }} usuarios</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Cantidad Categorias</h6>
                            <h6 class="font-extrabold mb-0">{{ $total_categorias }} categorias</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Productos Registrados</h6>
                            <h6 class="font-extrabold mb-0">{{ $total_productos }} productos</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cards de estadisticas de pedidos -->
    <h2>Pedidos: {{ $total_pedidos }} pedidos</h2>
    <div class="row">
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
                        <h6 class="text-muted font-semibold">Pedidos Nuevos / Sin Procesar</h6>
                        <h6 class="font-extrabold mb-0">{{ $total_pedidos_nuevos }} pedidos</h6>
                    </div>
                </div>
            </div>
        </div>

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
    </div>
    
@endsection
