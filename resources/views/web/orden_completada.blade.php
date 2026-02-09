@extends('layouts.web')

@section('title', 'Compra Exitosa | Confirmacion de Pedido')

@section('contenido')
    <div class="page-title light-background">
        <div class="container text-center">
            <h1 class="mb-2 mb-lg-0">Confirmacion de Pedido / Order</h1>
        </div>
    </div>
    <section id="confirmation" class="confirmation section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center mb-8">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 text-center p-5 bg-light-subtle">
                        <i class="bi bi-check-circle- text-success mb-3"></i>
                        <h2 class="card-title text-success mb-3">Pedido Completado!</h2>
                        <p class="lead mb-4">
                            Tu pedido ha sido procesado con exito y esta confirmado.Gracias por tu compra, te enviaremos un
                            correo de confirmacion en breve.
                        </p>

                        <div class="confirmation-details d-flex justify-content-around fw-bold flex-wrap">
                            <span class="mb-2 mb-md-0">
                                Orden N°: <span class="text-primarys">{{ $orden->codigo_referencia }}</span>
                            </span>
                            <span class="mb-2 mb-md-0">
                                Total Pagado: <span
                                    class="text-secondary">{{ $orden->moneda . ' ' . number_format($orden->total, 2) }}</span>
                            </span>
                            <span class="mb-2 mb-md-0">
                                Fecha: <span
                                    class="text-secondary">{{ \Carbon\Carbon::parse($orden->created_at)->format('d/m/Y H:i') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <!-- Columna izquierda -->
                <div class=" col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="mb-3">Detalle de la Orden</h4>
                    <div class="order-items list-group mb-4">

                        @foreach ($orden->detalles as $detalle)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $detalle->producto->nombre }}</h6>
                                    <br>
                                    @php
                                        $imagen_producto = '';

                                        if ($detalle->producto && $detalle->producto->imagen) {
                                            $img = $detalle->producto->imagen->first();
                                            $imagen_producto = $img->imagen ?? '';
                                        }
                                    @endphp
                                    <img src="{{ asset('storage/images/' . $imagen_producto) }}" alt="producto"
                                        class="img-fluid rounded-start"> <br>

                                    <small class="text-muted">
                                        Cantidad: {{ $detalle->cantidad }} <br>
                                        Precio unitario:{{ $ajuste->moneda . ' ' . number_format($detalle->precio, 2) }}
                                    </small>
                                    <br>
                                </div>
                                <span class="fw-bold">
                                    SubTotal:  {{ $ajuste->moneda . ' ' . number_format($detalle->cantidad * $detalle->precio, 2) }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="card p-3 mb-4 border-info-subtle bg-info-subtle">
                        <h5 class="card title mb-2"><i class="bi bi-geo-alt me-2"></i>Direccion de envio</h5>
                        <br>

                        <p class="card-text-2 p-3 mb-0">{{ $orden->usuario->nombre ?? ' ' }}</p>
                        <p class="card-text-3 p-3 mb-0">{{ $orden->usuario->email ?? ' ' }}</p>
                        <p class="card-text-1 p-3 mb-0">{{ $orden->direccion_envio }}</p>

                    </div>

                    <div>
                        <!-- Columna derecha: Resumen de pagos y contacto -->
                        <div class="col-lg-12" data-aos= "fade-up" data-aos-delay="300">
                            <div class="card shadow-sm p-4 mb-4">
                                <h5 class="mb-3">Resumen de Pagos</h5>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between mb-2">
                                        <span>Subtotal</span>
                                        <span
                                            class="fw-bold">{{ $ajuste->moneda . ' ' . number_format($orden->subtotal, 2) }}</span>
                                    </li>
                                    <!--
                                        <li class="d-flex justify-content-between mb-2 fw-bold pt-2 border-top">
                                            <span>Descuento:</span>
                                            <span class="text-success fs-5">{{-- $ajuste->divisa . ' ' . number_format($orden->descuento, 2) --}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between mb-2">
                                            <span>IVA</span>
                                            <span class="fw-bold">{{-- $ajuste->divisa . ' ' . number_format($orden->iva, 2) --}}</span>
                                        </li>
                                            <li class="d-flex justify-content-between mb-2">
                                            <span>Costo de envío</span>
                                            <span class="fw-bold">{{-- $ajuste->divisa . ' ' . number_format($orden->costo_envio, 2) --}}</span>                            <span class="fw-bold">{{ $ajuste->divisa . ' ' . number_format($orden->descuento, 2) }}</span>
                                        </li>
                                        -->
                                    <li class="d-flex justify-content-between fw-bold pt-2 border-top">
                                        <span>Total:</span>
                                        <span
                                            class="text-success fs-5">{{ $ajuste->moneda . ' ' . number_format($orden->total, 2) }}</span>
                                    </li>
                                </ul>
                                <hr>
                                <p class="text-muted mt-3 mb-0"> Metodo de pago: {{ $orden->metodo_pago }}</p>
                                <br>
                                <p class="text-muted mb-0"> Estado: {{ $orden->estado }}</p>
                                <hr>
                            </div>
                            <br>
                            <!-- pasos siguientes -->
                            <div class="card p-4">
                                <h5 class="mb-3"></i>Pasos siguientes</h5>
                                <p class="mb-2"><i class="bi bi-envelope me-2 text-warning"></i> Revisa tu correo
                                    electronico, te llegara la factura</p>
                                <p class="mb-2"><i class="bi bi-truck me-2 text-warning"></i> Recibiras una notificacion
                                    cuando se despache el pedido</p>
                                <a href=" " class="btn btn-outline-primary mt-3">Ver historial de pedidos</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection
