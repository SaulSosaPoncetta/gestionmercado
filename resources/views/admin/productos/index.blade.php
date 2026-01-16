@extends('layouts.admin')

@section('content')
    <h1>Productos</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Productos registrados
                        <a href="{{ route('admin.productos.create') }}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <form action="{{ route('admin.productos.index') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..."
                                        value="{{ request('buscar') ?? '' }}">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>
                                        Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ route('admin.productos.index') }}" class="btn btn-success">
                                            <i class="bi bi-trash"></i>Limpiar</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Categoria</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Codigo</th>
                                <th style="text-align: center">Descripcion corta</th>
                                <th style="text-align: center">Precio compra</th>
                                <th style="text-align: center">Precio venta</th>
                                <th style="text-align: center">Stock</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nroreg = ($productos->currentPage() - 1) * $productos->perPage() + 1;
                            @endphp
                            @foreach ($productos as $producto)
                                <tr>
                                    <td style="text-align: center">{{ $nroreg++ }}</td>
                                    <td>{{ $producto->categoria_id }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->descripcion_corta }}</td>
                                    <td>{{ $producto->precio_compra }}</td>
                                    <td>{{ $producto->precio_venta }}</td>
                                    <td>{{ $producto->stock }}</td>

                                    <td class="text-center">

                                        <div class="btn-group btn-gropu-sm" role="group">
                                            <a href="{{ route('admin.productos.show', $producto->id) }}"
                                                class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                            <a href="{{ route('admin.productos.show', $producto->id . '/imagenes') }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-card-image"></i> Imagenes</a>
                                            <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="preguntar{{ $producto->id }}(event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </div>

                                        <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST"
                                            id="miFormulario{{ $producto->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                        </form>
                                        <script>
                                            function preguntar{{ $producto->id }}(event) {
                                                event.preventDefault();

                                                Swal.fire({
                                                    title: '¿Desea eliminar este Producto?',
                                                    text: '',
                                                    icon: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    cancelButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $producto->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>




                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    @if ($productos->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                                {{ $productos->total() }} resultados
                                {{ $productos->links('pagination::bootstrap-4') }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
