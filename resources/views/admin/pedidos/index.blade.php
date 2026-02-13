@extends('layouts.admin')

@section('content')
    <h1>Pedidos</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pedidos registrados
                        <!--<a href="{{-- route('admin.productos.create') --}}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nuevo</a> -->
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <!-- Buscador de pedidos -->
                            <form action="{{ route('admin.pedidos.index') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..."
                                        value="{{ request('buscar') ?? '' }}">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>
                                        Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ route('admin.pedidos.index') }}" class="btn btn-success">
                                            <i class="bi bi-trash"></i>Limpiar</a>
                                    @endif
                                </div>
                            </form>
                            <!-- Fin buscador de pedidos -->
                        </div>
                    </div>
                    <hr>
                    <!-- Tabla de pedidos -->
                    <table class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Cliente</th>
                                <th style="text-align: center">Total</th>
                                <th style="text-align: center">Fecha Pedido</th>
                                <th style="text-align: center">Estado Pago</th>
                                <th style="text-align: center">Estado orden</th>
                                <th style="text-align: center">Direccion envio</th>
                                <th style="text-align: center">Detalle productos</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Paginador de pedidos -->
                            @php
                                $nroreg = ($ordenes->currentPage() - 1) * $ordenes->perPage() + 1;
                            @endphp
                            <!-- Fin paginador de pedidos -->
                            
                            <!-- Loop de pedidos para llenar la tabla -->
                            @foreach ($ordenes as $orden)
                                <tr>
                                    <td style="text-align: center">{{ $nroreg++ }}</td>
                                    <td>{{ $orden->usuario->name }} <br><small>{{ $orden->usuario->email }}</small></td>
                                    <td>{{ $orden->divisa . ' ' . $orden->total }}</td>
                                    <td>{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $orden->estado_pago }}</td>
                                    <td>{{ $orden->estado_orden }}</td>
                                    <td>{{ $orden->direccion_envio }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($orden->detalles as $detalle)
                                                <li>
                                                    {{ $detalle->producto->nombre }} - 
                                                    Cantidad: {{ $detalle->cantidad }} - 
                                                    Precio: {{ $orden->moneda . " " . $detalle->precio }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    
                                    <!-- Logica de acciones para cada pedido -->
                                    <td class="text-center">
                                        <div class="btn-group btn-gropu-sm" role="group">
                                            <a href="{{ route('admin.pedidos.create_envio', $orden->id) }}"
                                                class="@if($orden->estado_orden == 'Procesando') btn btn-success @else btn btn-info @endif"><i class="bi bi-truck"></i>
                                                @if($orden->estado_orden == 'Procesando') Enviar pedido @else Ver pedido @endif</a>
                                        </div>
                                    </td>
                                    <!-- Fin de la lógica de acciones -->
                                </tr>
                            @endforeach
                            <!-- Fin loop de pedidos -->
                    </table>
                    <!-- Fin tabla de pedidos -->

                    <!-- Paginador de pedidos -->
                    @if ($ordenes->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $ordenes->firstItem() }} a {{ $ordenes->lastItem() }} de
                                {{ $ordenes->total() }} resultados
                                {{ $ordenes->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                    <!-- Fin paginador de pedidos -->
                </div>
            </div>
        </div>
    </div>
@endsection
