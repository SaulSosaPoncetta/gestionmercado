@extends('layouts.admin')

@section('content')
        <h1>Categorias</h1>
        <hr>

        <div class="row">   
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorias registradas
                            <a href="{{ route('admin.categorias.create') }}" style="float:right" class="btn btn-primary"><i 
                                    class="bi bi-plus"></i> Crear nueva</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <form action="{{ route('admin.categorias.index') }}" method="GET" class="mt-3">
                                    <div class="input-group">
                                        <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ request('buscar') ?? ''}}">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>
                                            Buscar</button>
                                        @if (isset($_REQUEST['buscar']))
                                            <a href="{{ route('admin.categorias.index') }}" class="btn btn-success">
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
                                    <th style="text-align: center">Nombre de Categoria</th>
                                    <th style="text-align: center">Slug</th>
                                    <th style="text-align: center">Descripcion</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nroreg = ($categorias->currentPage() - 1) * $categorias->perPage() + 1;
                                @endphp
                                @foreach($categorias as $categoria)
                                    <tr>
                                        <td style="text-align: center">{{ $nroreg++ }}</td>
                                         <td>{{ $categoria->nombre }}</td>
                                         <td>{{ $categoria->slug }}</td>
                                         <td>{{ $categoria->descripcion }}</td>
                                         
                                         <td class="text-center"> 
                                            <div class="btn-group btn-gropu-sm" role="group" >
                                                <a href="{{ route('admin.categorias.show', $categoria->id) }}"
                                                    class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                                <a href="{{ route('admin.categorias.edit', $categoria->id) }}" 
                                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                                <button type="submit" 
                                                    class="btn btn-danger btn-sm" 
                                                    onclick="preguntar{{ $categoria->id }}(event)">
                                                    <i class="bi bi-trash"></i> Eliminar 
                                                </button>
                                            </div>
                                                
                                            <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST"
                                                id="miFormulario{{ $categoria->id }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                
                                            </form>
                                            <script>
                                                function preguntar{{ $categoria->id }}(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: '¿Desea eliminar esta Categoria?',
                                                        text: '',
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        cancelButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $categoria->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        
                                                                         
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        @if($categorias->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                                <div class="text-muted">
                                    Mostrando {{ $categorias->firstItem() }} a {{ $categorias->lastItem() }} de {{ $categorias->total() }} resultados
                                    {{ $categorias->links('pagination::bootstrap-4') }}</div>
                            </div>
                        @endif
                    </div>
                </div>    
            </div>                    
        </div>

@endsection