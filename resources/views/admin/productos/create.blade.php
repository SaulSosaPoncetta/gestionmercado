@extends('layouts.admin')

@section('content')
    <h1>Creacion de un nuevo producto</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los campos del formulario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.productos.create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="categoria_id">Nombre de la categoria (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                                            <option value="">Seleccione una categoria...</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('categoria->id') == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="nombre" class="form-label">Nombre del producto (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{ old('nombre') }}" placeholder="Nombre del producto..." required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="codigo">Codigo del producto (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                        <input type="text" name="codigo" id="codigo" class="form-control"
                                            value="{{ old('codigo') }}" placeholder="Codigo del producto..." required>
                                    </div>
                                    @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="descripcion_corta" class="form-label">Descripcion Corta (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-text-left"></i></span>
                                        <input name="descripcion_corta" id="descripcion_corta" class="form-control"
                                            placeholder="Descripcion corta..." maxlength="255"
                                            value="{{ old('descripcion_corta') }}" required></input>
                                    </div>
                                    @error('descripcion_corta')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <small class="text-muted"><span id="contador_corta">0</span>/255 caracteres</small>
                                </div>
                            </div>
                        <div class="col-md-8">
                                <div class="form-goup">
                                    <label for="descripcion_larga">Descripcion Larga</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-text-paragraph"></i></span>
                                        <textarea name="descripcion_larga" id="descripcion_larga" 
                                            class="form-control" rows="1"
                                            placeholder="Descripcion larga..." required>{{ old('descripcion_larga') }}</textarea>
                                    </div>
                                    @error('descripcion_larga')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        ClassicEditor
                                            .create(document.querySelector('#descripcion_larga'), {
                                                toolbar: [
                                                    'heading', '|',
                                                    'bold', 'italic', '|',
                                                    'link', 'bulletedList', 'numberedList', '|',
                                                    'blockQuote', 'insertTable', '|',
                                                    'undo', 'redo'
                                                ],
                                                language: 'es'
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    });
                                </script-->
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="name" class="form-label">Precio de compra (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                        <input type="number" name="precio_compra" id="precio_compra" 
                                            class="form-control" value="{{ old('precio_compra') }}" 
                                            placeholder="0.00..." step="0.01" min="0" required>
                                    </div>
                                    @error('precio_compra')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="name" class="form-label">Precio de venta (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                        <input type="number" name="precio_venta" id="precio_venta" class="form-control"
                                            value="{{ old('precio_venta') }}" placeholder="0.00..." step="0.01" min="0" required>
                                    </div>
                                    @error('precio_venta')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-goup">
                                    <label for="name" class="form-label">Stock (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-boxes"></i></span>
                                        <input type="number" name="stock" id="stock" class="form-control"
                                            value="{{ old('stock') }}" placeholder="0" step="0.01" min="0" required>
                                    </div>
                                    @error('stock')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                    <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
