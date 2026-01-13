@extends('layouts.admin')

@section('content')
        <h1>Usuarios</h1>
        <hr>

        <div class="row">   
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Usuarios registrados
                            <a href="{{ route('admin.usuarios.create') }}" style="float:right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear nuevo</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <form action="{{ route('admin.usuarios.index') }}" method="GET" class="mt-3">
                                    <div class="input-group">
                                        <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ request('buscar') ?? ''}}">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>Buscar</button>
                                        @if (isset($_REQUEST['buscar']))
                                            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-success">
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
                                    <th style="text-align: center">Rol del Usuario</th>
                                    <th style="text-align: center">Nombre del Usuario</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Tipo</th>
                                    <th style="text-align: center">Nro Cliente</th>
                                    <th style="text-align: center">Estado</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nroreg = ($usuarios->currentPage() - 1) * $usuarios->perPage() + 1;
                                @endphp
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td style="text-align: center">{{ $nroreg++ }}</td>
                                         <td>{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                                         <td>{{ $usuario->name }}</td>
                                         <td>{{ $usuario->email }}</td>
                                         <td>{{ $usuario->tipo }}</td>
                                         <td>{{ $usuario->numero_cliente }}</td>
                                         <td>
                                            @if($usuario->estado == 0)                              
                                                <span class="badge bg-danger">Inactivo</span>
                                            @else
                                                <span class="badge bg-success">Activo</span>
                                            @endif
                                         </td>
                                                                                                            
                                        <td class="text-center"> 
                                            @if ($usuario->estado == 1) 
                                                <a href="{{ route('admin.usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                                <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                                <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST"
                                                     id="miFormulario{{ $usuario->id }}" class="d-inline">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button type="submit" 
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="preguntar{{ $usuario->id }}(event)">
                                                        <i class="bi bi-trash"></i> Eliminar 
                                                     </button>
                                                </form>
                                                <script>
                                                function preguntar{{ $usuario->id }}(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: '¿Desea eliminar este Usuario?',
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        cancelButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $usuario->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        @else
                                            <form action="{{ route('admin.usuarios.restore', $usuario->id) }}" method="POST"
                                                     id="miFormulario{{ $usuario->id }}" class="d-inline">
                                                     @csrf
                                                     <button type="submit" class="btn btn-warning btn-sm" 
                                                        onclick="preguntar{{ $usuario->id }}(event)">
                                                        <i class="bi bi-arrow-clockwise"></i> Restaurar
                                                     </button>
                                                </form>
                                                <script>
                                                function preguntar{{ $usuario->id }}(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: '¿Desea restaurar este Usuario?',
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Restaurar',
                                                        cancelButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $usuario->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        @endif
                                        
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        @if($usuarios->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                                <div class="text-muted">
                                    Mostrando {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }} de {{ $usuarios->total() }} resultados
                                    {{ $usuarios->links('pagination::bootstrap-4') }}</div>
                            </div>
                        @endif
                    </div>
                </div>    
            </div>                    
        </div>

@endsection