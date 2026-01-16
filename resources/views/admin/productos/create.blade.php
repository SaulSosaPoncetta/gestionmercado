@extends('layouts.admin')

@section('content')
        <h1>Creacion de un nuevo producto</h1>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Llene los campos del formulario</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Nombre de la categoria (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                            <select name="categoria_id" id="categoria_id" class="form-control" required>
                                                <option value="">Seleccione una categoria...</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" {{ old('categoria->id') == $categoria->id ? 'selected' : '' }}> 
                                                        {{ $categoria->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('categoria_id')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Nombre del producto (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="nombre" id="nombre" class="form-control"  
                                            value="{{ old('nombre')}}" 
                                            placeholder="Nombre del producto..." required>
                                        </div>
                                        @error('nombre')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Codigo del producto (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="codigo" id="codigo" class="form-control"  
                                            value="{{ old('codigo')}}" 
                                            placeholder="Codigo del producto..." required>
                                        </div>
                                        @error('codigo')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">   
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="descripcion_corta" class="form-label">Descripcion Corta</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-text-paragraph"></i></span>
                                            <textarea name="descripcion_corta" id="descripcion_corta" class="form-control"  
                                            rows="3" placeholder="Descripcion corta..." 
                                            maxlength="255" required> {{ old('descripcion_corta')}}</textarea>
                                        </div>
                                        @error('descripcion_corta')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        <small class="text-muted"><span id="contador_corta">0</span>/255 caracteres</small>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-goup">
                                        <label for="descripcion_larga">Descripcion Larga</label>
                                        <div class="input-group">
                                            <textarea name="descripcion_larga" id="descripcion_larga" class="form-control"  
                                            placeholder="Descripcion larga..." rows="4">{{ old('descripcion_larga')}}</textarea>
                                        </div>
                                        @error('descripcion_larga')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                                    <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                            ClassicEditor
                                                   .create(document.querySelector('#descripcion_larga'), {
                                            toolbar: [
                                                    'heading', '|',  
                                                    'bold', 'italic', 'underline', '|',
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
                                    </script>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Precio de compra (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="precio_compra" id="precio_compra" class="form-control"  
                                            value="{{ old('precio_compra')}}" 
                                            placeholder="Precio de compra..." required>
                                        </div>
                                        @error('precio_compra')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Precio de venta (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="precio_venta" id="precio_venta" class="form-control"  
                                            value="{{ old('precio_venta')}}" 
                                            placeholder="Precio de venta..." required>
                                        </div>
                                        @error('precio_venta')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="col-md-4"> 
                                    <div class="form-goup">
                                        <label for="name" class="form-label">Stock (*)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="stock" id="stock" class="form-control"  
                                            value="{{ old('stock')}}" 
                                            placeholder="Stock..." required>
                                        </div>
                                        @error('stock')
                                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                            </div>
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