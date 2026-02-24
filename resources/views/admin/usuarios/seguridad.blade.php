@extends('layouts.admin')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Seguridad de Usuario</h3>
                    <p class="text-subtitle text-muted">
                        En esta página podrás ver y actualizar tu seguridad de usuario.
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
                            <img src="{{ asset('storage/' . $ajuste->logo) }}" alt="Avatar">
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
            {{-- COLUMNA SEGURIDAD --}}
            <div class="col-6 col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.usuarios.actualizar_seguridad', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="current_password" class="form-label">Contraseña actual</label>
                                <input type="password" class="form-control" id="current_password" name="current_password"
                                    placeholder="Ingrese su contraseña actual..." required>
                            </div>

                            <div class="form-group">
                                <label for="password"> Nueva Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Ingrese su nueva contraseña..." required>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirmar Contraseña..." value=""
                                    required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
