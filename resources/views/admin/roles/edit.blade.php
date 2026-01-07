@extends('layouts.admin')

@section('content')
        <h1>Modificar rol: {{ $rol->name }}</h1>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Llene los campos del formulario</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $rol->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Nombre del rol (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="name" id="name" value="{{ $rol->name }}" class="form-control" placeholder="Nombre del rol..." >
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>    
                        </form> 
                  </div>
                </div>    
            </div>                    
        </div>

@endsection