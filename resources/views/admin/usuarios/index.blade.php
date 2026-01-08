@extends('layouts.admin')

@section('content')
        <h1>Usuarios</h1>
        <hr>

        <div class="row">   
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Usuarios registrados
                        <hr>
                            <a href="{{ route('admin.usuarios.create') }}" style="float:right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear nuevo</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Nro</th>
                                    <th style="text-align: center">Rol del Usuario</th>
                                    <th style="text-align: center">Nombre del Usuario</th>
                                    <th style="text-align: center">Email</th>
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
                                         <td>{{ $usuario->name }}</td>
                                         <td>{{ $usuario->name }}</td>
                                         <td>{{ $usuario->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline-block" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¡Seguro deseas eliminar el Rol?')">
                                                <i class="bi bi-trash"></i> Eliminar </button>
                                            </form>
                                                
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        @if($usuarios->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                                <div class="text-muted">
                                    Mostrando {{ $usuario->firstItem() }} a {{ $usuario->lastItem() }} de {{ $usuario->total() }} resultados
                                </div>
                                {{ $usuario->links('pagination::bootstrap-4') }}
                            </div>
                        @endif
                    </div>
                </div>    
            </div>                    
        </div>

@endsection