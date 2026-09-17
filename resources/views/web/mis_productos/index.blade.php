@extends('layouts.web')

@section('contenido')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">

    @if (session('mensaje'))
        <div class="alert alert-{{ session('icono') == 'success' ? 'success' : 'danger' }}">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Mis Productos</h2>
        <a href="{{ route('web.mis_productos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Publicar producto
        </a>
    </div>

    <form method="GET" action="{{ route('web.mis_productos.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o código..." value="{{ request('buscar') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio venta</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio_venta, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <a href="{{ route('web.mis_productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="{{ route('web.mis_productos.imagenes', $producto->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-image"></i>
                        </a>
                        <form action="{{ route('web.mis_productos.destroy', $producto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Todavía no publicaste ningún producto.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $productos->links() }}
</div>
@endsection
