@extends('layouts.admin')

@section('content')
        <h1>Ajustes del sistema </h1>
        <hr>

        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ajustes y Configuraciones</h4>
                                <hr>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.ajustes.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-goup">
                                                            <label for="nombre" class="form-label">Nombre (*)</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                                <input type="text" name="nombre" id="nombre" 
                                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                                    placeholder="Nombre de la Empresa..." value="{{ old('nombre', $ajuste->nombre ?? '') }}" 
                                                                    required>
                                                                @error('nombre')
                                                                    <div class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-goup">
                                                            <label for="descripcion" class="form-label">Descripcion (*)</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                                                <input type="text" name="descripcion" id="descripcion" 
                                                                    class="form-control @error('descripcion') is-invalid @enderror"
                                                                    value="{{ old('descripcion', $ajuste->descripcion ?? '') }}"
                                                                    placeholder="Descripcion de la actividad de la Empresa..."  required>
                                                                @error('descripcion')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                             </div>
                                                        </div>
                                                     </div>
                                                     <div class="col-md-4">
                                                        <div class="form-goup">
                                                            <label for="sucursal" class="form-label">Sucursal (*)</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                                <input type="text" name="sucursal" id="sucursal" 
                                                                    class="form-control @error('sucursal') is-invalid @enderror"
                                                                    value="{{ old('sucursal', $ajuste->sucursal ?? '') }}"
                                                                    placeholder="Nombre de la Sucursal..."  required>
                                                                @error('sucursal')
                                                                    <div class="invalid-feedback">{{ $message }}</div> 
                                                                @enderror
                                                              </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <div class="form-goup">
                                                            <label for="direccion" class="form-label">Direccion (*)</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                                <textarea name="direccion" id="direccion" rows="3" class="form-control @error('direccion') is-invalid @enderror"
                                                                     placeholder="Calle, Nro, Piso, CP, Ciudad, Estado, Pais..." required>{{ old('direccion', $ajuste->direccion ?? '') }}</textarea>
                                                                @error('direccion')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                             </div>
                                                        </div>
                                                      </div> 
                                                      <div class="col-md-6">
                                                          <div class="form-goup">
                                                             <label for="telefono" class="form-label">Telefono (*)</label>
                                                             <div class="input-group">
                                                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                                <input type="text" name="telefono" id="telefono" 
                                                                    class="form-control @error('telefono') is-invalid @enderror"
                                                                    placeholder="Telefono de la Empresa..." 
                                                                    value="{{ old('telefono', $ajuste->telefono ?? '') }}" required>
                                                                @error('telefono')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                              </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                            <div class="form-goup">
                                                                <label for="email" class="form-label">E-mail (*)</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                                    <input type="text" name="email" id="email" 
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        placeholder="E-mail de la Empresa..." 
                                                                        value="{{ old('email', $ajuste->email ?? '') }}" required>
                                                                     @error('email')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                     @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <div class="form-goup">
                                                                <label for="moneda" class="form-label">Moneda (*)</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="bi bi-dollar"></i></span>
                                                                    <select name="moneda" id="" class="form-control">
                                                                    <option value="">Seleccione una moneda...</option>
                                                                        @foreach ($monedas as $moneda)
                                                                             <option value="{{ $moneda['symbol'] }}"
                                                                                {{ old('moneda', $ajuste->moneda ?? '') == $moneda['symbol'] ? 'selected' : '' }}>
                                                                                {{ $moneda['name'] }} ({{ $moneda['symbol'] }}) 
                                                                             </option>
                                                                        @endforeach
                                                                     </select>
                                                                     @error('moneda')
                                                                         <div class="invalid-feedback">{{ $message }}</div>
                                                                     @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-goup">
                                                                <label for="pagina_web" class="form-label">Pagina Web (Opcional)</label>
                                                                <div class="input-group">
                                                                   <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                                                   <input type="text" name="pagina_web" id="pagina_web" 
                                                                        class="form-control @error('pagina_web') is-invalid @enderror"
                                                                        placeholder="Pagina Web de la Empresa..." 
                                                                        value="{{ old('pagina_web', $ajuste->pagina_web ?? '') }}" required>
                                                                    @error('pagina_web')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                <div class="col-md-12">
                                                     <br>
                                                     <h4>Imagenes</h4>
                                                     <hr>
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                               <div class="form-goup">
                                                                        <label for="logo" class="form-label">Logo @if(!isset($ajuste) || !$ajuste->logo) (*) @else @endif</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                                            <input type="file" name="logo" id="logo" onchange="mostrarImagen(event)"
                                                                                class="form-control @error('logo') is-invalid @enderror"
                                                                                accept="image/*" @if(!isset($ajuste) || !$ajuste->logo) required @else  @endif>
                                                                            @error('logo')
                                                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                                            @enderror
                                                                        </div>
                                                                </div>
                                                                <center>
                                                                        @if(isset($ajuste) && $ajuste->logo)
                                                                            <img src="{{ asset('storage/' .$ajuste->logo) }}" id="preview1" style="max-width:200px; margin-top:10px" 
                                                                            alt="Logo Actual">                                                                                                                                                  
                                                                        @else
                                                                            <img src="" id="preview1" alt="Logo" style="max-width: 300px; margin-top:10px;" />
                                                                        @endif
                                                                </center>
                                                                <br>
                                                                <script>
                                                                    const mostrarImagen = e => 
                                                                        document.getElementById('preview1').src = URL.createObjectURL(e.target.files[0]);
                                                                </script>
                                                           </div>
                                                            </div>
                                                           <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="form-goup">
                                                                        <label for="imagen_login" class="form-label">Imagen Login @if(!isset($ajuste) || !$ajuste->imagen_login) (*) @else @endif</label>
                                                                        <div class="input-group">
                                                                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                                                <input type="file" name="imagen_login" id="imagen_login" onchange="mostrarImagen2(event)"
                                                                                        class="form-control @error('imagen_login') is-invalid @enderror"
                                                                                        accept="image/*"  @if(!isset($ajuste) || !$ajuste->imagen_login) required @else  @endif>
                                                                                        @error('imagen_login')
                                                                                           <div class="invalid-feedback" ><strong>{{ $message }}</strong></div>
                                                                                        @enderror
                                                                          </div>
                                                                   </div>
                                                                <center>
                                                                        @if(isset($ajuste) && $ajuste->imagen_login)
                                                                            <img src="{{ asset('storage/' .$ajuste->imagen_login) }}" id="preview2" style="max-width:200px; margin-top:10px" 
                                                                            alt="Imagen Login Actual">                                                                                                                                                  
                                                                        @else
                                                                             <img src="" id="preview2" alt="imagen login" style="max-width: 300px; margin-top:10px;" />
                                                                        @endif
                                                                </center>
                                                                <br>
                                                                <script>
                                                                    const mostrarImagen2 = e => 
                                                                        document.getElementById('preview2').src = URL.createObjectURL(e.target.files[0]);
                                                                </script>
                                                                </div>
                                                        </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                                <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                                                                Guardar Cambios</button>

                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                     
                                </div>
                        </div>
                </div>
        </div>

@endsection