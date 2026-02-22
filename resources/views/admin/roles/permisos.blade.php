@extends('layouts.admin')

@section('content')
    <h1>Permisos de rol: {{ $rol->name }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permisos registrados
                        <a href="{{ route('admin.productos.create') }}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.update_permisos', $rol->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @foreach ($permisos as $grupo => $permisos_grupo)
                                <h5>{{ $grupo }}</h5>
                                <div class="row">
                                    @foreach ($permisos_grupo as $permiso)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permisos[]"
                                                    value="{{ $permiso->id }}" id="{{ $permiso->name }}"
                                                    {{ $rol->hasPermissionTo($permiso) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="{{ $permiso->name }}">
                                                    {{ $permiso->name }}
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar permisos</button>
                                <a href="{{ route('admin.roles.index', $rol->id) }}" class="btn btn-info">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
