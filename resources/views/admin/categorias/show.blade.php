@extends('layouts.admin')

@section('content')
        <h1>Categoria: {{ $categoria->nombre }}</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Datos de la categoria</h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="nombre">Nombre:</label>
                                        <p><i class="bi bi-tag"></i>{{ $categoria->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="slug">Slug:</label>
                                        <p><i class="bi bi-link-45deg"></i>{{ $categoria->slug }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="descripcion">Descripcion:</label>
                                        <p><i class="bi bi-text">{{ $categoria->descripcion }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="created_at">Fecha y Hora de Creacion:</label>
                                        <p><i class="bi bi-calendar-plus"></i>{{ $categoria->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                           </div>  
                    </div>
                </div>    
            </div>                    
        </div>
@endsection