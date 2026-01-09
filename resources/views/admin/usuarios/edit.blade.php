@extends('layouts.admin')

@section('content')
        <h1>Modificacion de datos de usuario: {{ $usuario->name }}</h1>
        <hr>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Llene los campos del formulario</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="rol" class="form-label">Roles de usuario (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
                                            <select name="rol" id="rol" class="form-control" required>
                                                <option value="">Seleccione un rol...</option>
                                                @foreach($roles as $rol)
                                                    @if (!($rol->name == 'SUPER ADMIN'))
                                                        <option value="{{ $rol->name }}"
                                                            {{ old('rol', $usuario->roles->pluck('name')->implode(', ')) == $rol->name ? 'selected' : '' }}>    
                                                            {{ $rol->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('rol')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="name" >Nombre (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$usuario->name) }}" placeholder="Nombre completo..." required>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="email" >Correo Electronico (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email',$usuario->email) }}" placeholder="ejemplo@ejemplo.com.ar" required>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="password" >Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Contraseña...">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="pass_confirmation" >Confirmar Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" placeholder="Repetir contraseña...">
                                        </div>
                                        @error('password_confirmation')
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
                                        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        
                                    </div>
                                </div>
                            </div>    
                        </form> 
                  </div>
                </div>    
            </div>                    
        </div>

@endsection