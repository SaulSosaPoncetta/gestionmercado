@extends('layouts.admin')

@section('content')
        <h1>Roles</h1>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles registrados</h4>
                        <hr>
                        <a href="{{ route('admin.roles.create') }}" style="float:right" class="btn btn-primary"><i class="bi bi-plus"></i> Crear nuevo</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Nro</th>
                                    <th style="text-align: center">Nombre del rol</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $nroreg = ($roles->currentPage() - 1) * $roles->perPage() + 1;
                                @endphp

                                @foreach($roles as $rol)
                                    <tr>
                                        <td style="text-align: center">{{ $nroreg++ }}</td>
                                        <td>{{ $rol->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.roles.show', $rol->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                            <a href="{{ route('admin.roles.edit', $rol->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                            <form action="{{ route('admin.roles.destroy', $rol->id) }}" method="POST" style="display:inline-block" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¡Seguro deseas eliminar el Rol?')">
                                                <i class="bi bi-trash"></i> Eliminar </button>
                                            </form>
                                                
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        @if($roles->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                                <div class="text-muted">
                                    Mostrando {{ $roles->firstItem() }} a {{ $roles->lastItem() }} de {{ $roles->total() }} resultados
                                </div>
                                {{ $roles->links('pagination::bootstrap-4') }}
                            </div>
                        @endif
                    </div>
                </div>    
            </div>                    
        </div>

@endsection