@extends('layouts.web')

@section('contenido')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">

    @if (session('mensaje'))
        <div class="alert alert-{{ session('icono') == 'success' ? 'success' : 'danger' }}">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Imágenes de: {{ $producto->nombre }}</h2>
        <a href="{{ route('web.mis_productos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <hr>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('web.mis_productos.cargaimagen', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-8">
                        <label class="form-label">Nueva imagen (*)</label>
                        <input type="file" name="imagen" accept="image/*"
                            class="form-control @error('imagen') is-invalid @enderror" required>
                        @error('imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-upload"></i> Subir imagen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse ($producto->imagenes as $imagen)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $imagen->imagen) }}" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body p-2">
                        <form action="{{ route('web.mis_productos.eliminaimagen', $imagen->id) }}" method="POST"
                            onsubmit="return confirm('¿Eliminar esta imagen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <p class="text-center">Este producto todavía no tiene imágenes.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
