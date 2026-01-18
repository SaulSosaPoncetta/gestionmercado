@extends('layouts.admin')

@section('content')
    <h1>Datos del Producto: {{ $producto->nombre }}
        <div class="form-group" style="float:right;">
            <a href="{{ route('admin.productos.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalle:</h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-goup">
                                <label for="name" class="form-label">Categoria:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->categoria->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-goup">
                                <label for="name" class="form-label">Nombre:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-goup">
                                <label for="name" class="form-label">Codigo:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->codigo }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-goup">
                                <label for="descripcion_corta" class="form-label">Descripcion Corta:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->descripcion_corta }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-goup">
                                <label for="descripcion_larga">Descripcion Larga:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->descripcion_larga }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-goup">
                                <label for="name" class="form-label">Precio de compra:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->precio_compra }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-goup">
                                <label for="name" class="form-label">Precio de venta:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->precio_venta }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-goup">
                                <label for="name" class="form-label">Stock:</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->stock }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Imagenes del producto:

                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                        <div class="row">
                            @foreach ($producto->imagenes as $imagen)
                                <div class="col-md-3" style="margin-bottom:20px;">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $imagen->imagen) }}" style="width:75%"
                                        alt="Imagen del producto">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
