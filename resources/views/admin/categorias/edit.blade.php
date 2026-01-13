@extends('layouts.admin')

@section('content')
        <h1>Editar o modificar categoria: {{ $categoria->nombre }}</h1>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Llene los campos del formulario</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <br>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Nombre de la categoria (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="nombre" id="nombre" class="form-control"  
                                            value="{{ old('nombre', $categoria->nombre)}}" 
                                            placeholder="Nombre de la categoria..." required>
                                        </div>
                                        @error('nombre')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Slug (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="slug" id="slug" class="form-control"  
                                            value="{{ old('slug', $categoria->slug)}}" 
                                            placeholder="Slug-de-la-categoria..." readonly required>
                                        </div>
                                        @error('slug')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        <small class="text-muted"> URL amigable (ej: electronica, ropa-deportiva)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="descripcion" class="form-label">Descripcion</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-text-paragraph"></i></span>
                                            <textarea name="descripcion" id="descripcion" class="form-control"  
                                            placeholder="Descripcion de la categoria..." rows="4">{{ old('descripcion', $categoria->descripcion)}}</textarea>
                                        </div>
                                        @error('descripcion')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>    
                        </form> 
                  </div>
                </div>    
            </div>                    
        </div>
<script>
document.getElementById("nombre").addEventListener("input", function() {
    let nombre = this.value;
    let slug = nombre.toLowerCase()
        .replace(/[àáâãäå]/g,'a')
        .replace(/[èéêë]/g, 'e')
        .replace(/[ìíîï]/g, 'i')
        .replace(/[òóôõö]/g, 'o')
        .replace(/[ùúûü]/g, 'u')
        .replace(/ñ/g, 'n')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');

    document.getElementById("slug").value = slug;
});
</script>
@endsection