@extends('layouts.admin')

@section('content')
        <h1>Datos del rol: {{ $rol->name }}</h1>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Datos registrados </h4>
                        <hr>
                    </div>
                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Nombre del rol</label>
                                        <p><i class="bi bi-person-badge-fill"></i> {{ $rol->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Fecha y hora de registro</label>
                                        <p><i class="bi bi-clock"></i> {{ $rol->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>    
  
                  </div>
                </div>    
            </div>                    
        </div>

@endsection