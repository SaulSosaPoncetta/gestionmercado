@extends('layouts.web')

@section('contenido')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">

    <h2>Editar producto</h2>
    <hr>

    <form action="{{ route('web.mis_productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nombre (*)</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto->nombre) }}" required>
                @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Código (*)</label>
                <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $producto->codigo) }}" required>
                @error('codigo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-12">
                <label class="form-label">Descripción corta (*)</label>
                <input type="text" name="descripcion_corta" class="form-control @error('descripcion_corta') is-invalid @enderror" value="{{ old('descripcion_corta', $producto->descripcion_corta) }}" required>
                @error('descripcion_corta')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-12">
                <label class="form-label">Descripción larga (*)</label>
                <textarea name="descripcion_larga" rows="4" class="form-control @error('descripcion_larga') is-invalid @enderror" required>{{ old('descripcion_larga', $producto->descripcion_larga) }}</textarea>
                @error('descripcion_larga')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Precio de compra (*)</label>
                <input type="number" step="0.01" min="0" name="precio_compra" class="form-control @error('precio_compra') is-invalid @enderror" value="{{ old('precio_compra', $producto->precio_compra) }}" required>
                @error('precio_compra')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Precio de venta (*)</label>
                <input type="number" step="0.01" min="0" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{ old('precio_venta', $producto->precio_venta) }}" required>
                @error('precio_venta')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Stock (*)</label>
                <input type="number" min="0" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $producto->stock) }}" required>
                @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Categoría (*)</label>
                <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <hr>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar cambios</button>
        <a href="{{ route('web.mis_productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
