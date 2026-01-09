@extends('layouts.admin')

@section('content')
        <h1>Datos del usuario: {{ $usuario->name }}</h1>
        <hr>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Datos registrados</h4>
                        <hr>
                    </div>
                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="rol">Rol de usuario</label>
                                        <p><i class="bi bi-shield-check"></i> {{ $usuario->roles->pluck('name')->implode(', ') }}</p>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="name" >Nombre</label>
                                        <p><i class="bi bi-person-badge-fill"></i>{{ $usuario->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="email" >Correo Electronico</label>
                                        <p><i class="bi bi-envelope-fill"></i> {{ $usuario->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="name">Fecha y Hora de Registro</label>
                                        <p><i class="bi bi-calendar-date"></i> {{ $usuario->created_at }}</p>
                                    </div>
                                </div>
                            </div>    
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>    
                </div>                    
            </div>

@endsection