@extends('layouts.admin')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Perfil de Usuario</h3>
                <p class="text-subtitle text-muted">
                    En esta página podrás ver y actualizar tu perfil de usuario.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perfil de Usuario
                        </li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </div>
</div>

<section>
    <div class="row">

        {{-- COLUMNA PERFIL --}}
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="avatar avatar-2xl mb-3">
                        <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                    </div>

                    <h3 class="font-bold">{{ $usuario->name }}</h3>
                    <p class="text-muted">{{ $usuario->email }}</p>

                    <div class="mt-3">
                        <h5 class="font-bold">Roles:</h5>
                        @forelse ($usuario->roles as $rol)
                            <span class="badge bg-primary">{{ $rol->name }}</span>
                        @empty
                            <span class="badge bg-secondary">Sin roles</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- COLUMNA FORMULARIO --}}
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.usuarios.actualizar_perfil', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $usuario->name }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $usuario->email }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="{{ $usuario->telefono }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="cumpleanios" class="form-label">Cumpleaños</label>
                                <input type="date" class="form-control" id="cumpleanios" name="cumpleaños"
                                    value="{{ $usuario->cumpleaños }}">
                            </div>

                            <div class="col-md-4">
                                <label for="genero" class="form-label">Género</label>
                                <select class="form-control" id="genero" name="genero">
                                    <option value="">Seleccionar Género</option>
                                    <option value="Masculino" {{ $usuario->genero == 'Masculino' ? 'selected' : '' }}>
                                        Masculino
                                    </option>
                                    <option value="Femenino" {{ $usuario->genero == 'Femenino' ? 'selected' : '' }}>
                                        Femenino
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="password" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-muted">
                                    Dejar vacío si no deseas cambiarla.
                                </small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection