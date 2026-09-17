@extends('layouts.web')

@section('contenido')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">

    <h2>Mis Ventas</h2>
    <p class="text-muted">Comisión de la plataforma: {{ number_format($comision, 2) }}%</p>
    <hr>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Comprador</th>
                <th>Productos</th>
                <th>Total venta</th>
                <th>Comisión</th>
                <th>Neto a recibir</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ordenes as $orden)
                @php
                    $montoComision = $orden->total * ($comision / 100);
                    $neto = $orden->total - $montoComision;
                @endphp
                <tr>
                    <td>{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $orden->usuario->name ?? '-' }}</td>
                    <td>
                        @foreach ($orden->detalles as $detalle)
                            {{ $detalle->producto->nombre ?? 'Producto eliminado' }} (x{{ $detalle->cantidad }})<br>
                        @endforeach
                    </td>
                    <td>{{ $ajuste->moneda }} {{ number_format($orden->total, 2) }}</td>
                    <td>{{ $ajuste->moneda }} {{ number_format($montoComision, 2) }}</td>
                    <td><strong>{{ $ajuste->moneda }} {{ number_format($neto, 2) }}</strong></td>
                    <td>{{ $orden->estado_orden }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Todavía no tenés ventas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $ordenes->links() }}
</div>
@endsection
