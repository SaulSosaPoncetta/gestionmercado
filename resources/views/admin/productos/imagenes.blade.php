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
                    <h4>Imagenes del producto
                        <!-- Button trigger modal -->
                        <div style="float:right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-plus"></i> Cargar imagenes
                            </button>
                        </div>
                    </h4>
                    <br>
                    <hr>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar Imagen del producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.productos.uploadimagen', $producto->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-goup">
                                                    <label for="imagen" class="form-label">Imagen del producto(*)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                        <input type="file" name="imagen" id="imagen"
                                                            onchange="mostrarImagen(event)"
                                                            class="form-control @error('imagen') is-invalid @enderror"
                                                            accept="image/*" required>
                                                        @error('imagen')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <center>
                                                    <img src="" id="preview"
                                                        style="max-width: 200px; margin-top:10px" />
                                                </center>

                                                <script>
                                                    const mostrarImagen = e =>
                                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                                </script>
                                                <br>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            @foreach ($producto->imagenes as $imagen)
                                <div class="col-md-3" style="margin-bottom:20px;">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $imagen->imagen) }}" style="width:75%"
                                        alt="Imagen del producto">
                                        <br>
                                        <form action="{{ route('admin.productos.eliminaimagen', $imagen->id) }}" method="POST"
                                                     id="miFormulario{{ $imagen->id }}" class="d-inline">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button type="submit" 
                                                        class="btn btn-danger btn-sm btn-block"
                                                        onclick="preguntar{{ $imagen->id }}(event)">
                                                        <i class="bi bi-trash"></i> Eliminar Imagen
                                                     </button>
                                                </form>
                                                <script>
                                                function preguntar{{ $imagen->id }}(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: '¿Desea eliminar esta Imagen?',
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        cancelButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $imagen->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                                                       
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
