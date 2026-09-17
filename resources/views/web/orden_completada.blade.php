@extends('layouts.web')

@section('title', 'Compra Exitosa | Confirmacion de Pedido')

@section('contenido')
    <div class="page-title light-background">
        <div class="container text-center">
            <h1 class="mb-2 mb-lg-0">Confirmación de Pedido</h1>
        </div>
    </div>
    <section id="confirmation" class="confirmation section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            @php
                $totalGeneral = $ordenes->sum('total');
            @endphp

            <div class="row justify-content-center mb-4">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 text-center p-5 bg-light-subtle">
                        <i class="bi bi-check-circle text-success mb-3" style="font-size: 3rem;"></i>
                        <h2 class="card-title text-success mb-3">¡Pedido Completado!</h2>
                        <p class="lead mb-4">
                            Tu pedido fue procesado con éxito. Te enviaremos un correo de confirmación en breve.
                        </p>
                        <div class="confirmation-details d-flex justify-content-around fw-bold flex-wrap">
                            <span class="mb-2 mb-md-0">
                                Transacción: <span class="text-primary">{{ $orden->transaccion_id }}</span>
                            </span>
                            <span class="mb-2 mb-md-0">
                                Total pagado: <span class="text-secondary">{{ $ajuste->moneda . ' ' . number_format($totalGeneral, 2) }}</span>
                            </span>
                            <span class="mb-2 mb-md-0">
                                Fecha: <span class="text-secondary">{{ \Carbon\Carbon::parse($orden->created_at)->format('d/m/Y H:i') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-3 mb-4 border-info-subtle bg-info-subtle">
                        <h5 class="mb-2"><i class="bi bi-geo-alt me-2"></i>Dirección de envío</h5>
                        <p class="mb-0">{{ $orden->usuario->name ?? '' }}</p>
                        <p class="mb-0">{{ $orden->usuario->email ?? '' }}</p>
                        <p class="mb-0">{{ $orden->direccion_envio }}</p>
                    </div>

                    <h4 class="mb-3">Detalle del pedido</h4>

                    @foreach ($ordenes as $subOrden)
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="bi bi-shop me-2"></i>
                                    Vendido por: <strong>{{ $subOrden->vendedor->name ?? $ajuste->nombre }}</strong>
                                </span>
                                <span class="fw-bold">{{ $ajuste->moneda . ' ' . number_format($subOrden->total, 2) }}</span>
                            </div>
                            <div class="list-group list-group-flush">
                                @foreach ($subOrden->detalles as $detalle)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-0">{{ $detalle->producto->nombre ?? 'Producto eliminado' }}</h6>
                                            <small class="text-muted">
                                                Cantidad: {{ $detalle->cantidad }} &middot;
                                                Precio unitario: {{ $ajuste->moneda . ' ' . number_format($detalle->precio, 2) }}
                                            </small>
                                        </div>
                                        <span class="fw-bold">
                                            {{ $ajuste->moneda . ' ' . number_format($detalle->cantidad * $detalle->precio, 2) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="card p-4">
                        <h5 class="mb-3">Pasos siguientes</h5>
                        <p class="mb-2"><i class="bi bi-envelope me-2 text-warning"></i> Revisá tu correo electrónico, ahí te llegará la confirmación de cada vendedor.</p>
                        <p class="mb-2"><i class="bi bi-truck me-2 text-warning"></i> Vas a recibir una notificación cuando se despache cada pedido.</p>
                        <a href="{{ route('web.dashboard') }}" class="btn btn-outline-primary mt-3">Ver mi cuenta</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
