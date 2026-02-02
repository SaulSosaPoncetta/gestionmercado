@extends('layouts.web')

@section('contenido')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Carrito</h1>
            <nav class="breadcrumbs">

            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Cart Section -->
    <section id="cart" class="cart section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="cart-items">
                        <div class="cart-header d-none d-lg-block">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h5>Producto</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Precio</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Cantidad</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>SubTotal</h5>
                                </div>
                            </div>
                        </div>

                        @php
                            $total=0;
                        @endphp
                        
                        @foreach ($carritos as $carrito)
                      
                            <!-- Item de carrito uno por articulo-->
                            <div class="cart-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                                        <div class="product-info d-flex align-items-center">
                                            <div class="product-image">
                                               @php
                                                    $imagen_producto = $carrito->producto->imagenes->first();
                                                    $imagen = $imagen_producto->imagen ?? '';
                                                @endphp
                                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product"
                                                    class="img-fluid" loading="lazy">
                                            </div>
                                            <div class="product-details">
                                                <h6 class="product-title">{{ $carrito->producto->nombre }}</h6>
                                                <span class="badge bg-danger">{{ $carrito->producto->stock}} unidades disponibles</span>
                                                <br>
                                                <button class="remove-item" type="button">
                                                    <i class="bi bi-trash"></i> Quitar del carrito
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                        <div class="price-tag">
                                            <span class="current-price">{{ $ajuste->moneda . ' ' . $carrito->producto->precio_venta }}</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                        <div class="quantity-selector">
                                            <button class="quantity-btn decrease">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="number" class="quantity-input" value="{{$carrito->cantidad}}" min="1"
                                                max="{{$carrito->producto->stock}}">
                                            <button class="quantity-btn increase">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                        <div class="item-total">
                                          @php
                                              $subtotal = $carrito->producto->precio_venta * $carrito->cantidad;
                                              $total += $subtotal;
                                          @endphp
                                          <span>{{ $ajuste->moneda . ' ' . $subtotal }}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Fin de item de carrito uno por articulo-->

                        @endforeach




                        <div class="cart-actions">
                            <div class="row">
                                <div class="col-lg-6 mb-3 mb-lg-0">
                                    <div class="coupon-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Coupon code">
                                            <button class="btn btn-outline-accent" type="button">Aplicar cupon de
                                                descuento</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-md-end">
                                    <button class="btn btn-outline-heading me-2">
                                        <i class="bi bi-arrow-clockwise"></i> Actualizar Carrito
                                    </button>
                                    <button class="btn btn-outline-remove">
                                        <i class="bi bi-trash"></i> Vaciar Carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="cart-summary">
                        <h4 class="summary-title">Resumen de su Orden/Pedido</h4>

                        <div class="summary-item">
                            <span class="summary-label">Total</span>
                            <span class="summary-value">{{ $ajuste->moneda . ' ' . $total }}</span>
                        </div>

                        <div class="summary-item shipping-item">
                            <span class="summary-label">Envio</span>
                            <div class="shipping-options">
                                <div class="form-check text-end">
                                    <input class="form-check-input" type="radio" name="shipping" id="standard"
                                        checked="">
                                    <label class="form-check-label" for="standard">
                                        Envio Standar - $4.99
                                    </label>
                                </div>
                                <div class="form-check text-end">
                                    <input class="form-check-input" type="radio" name="shipping" id="express">
                                    <label class="form-check-label" for="express">
                                        Envio Express - $12.99
                                    </label>
                                </div>
                                <div class="form-check text-end">
                                    <input class="form-check-input" type="radio" name="shipping" id="free">
                                    <label class="form-check-label" for="free">
                                        Envio Gratis (Pedidos de mas de $30000)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="summary-item">
                            <span class="summary-label">Impuestos</span>
                            <span class="summary-value">$21.00</span>
                        </div>

                        <div class="summary-item discount">
                            <span class="summary-label">Descuento</span>
                            <span class="summary-value">-$0.00</span>
                        </div>

                        <div class="summary-total">
                            <span class="summary-label">Total</span>
                            <span class="summary-value">{{ $ajuste->moneda . ' ' . $total }}</span>
                        </div>

                        <div class="checkout-button">
                            <a href="#" class="btn btn-accent w-100">
                                Realizar Checkout <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <div class="continue-shopping">
                            <a href="{{'/'}}" class="btn btn-link w-100">
                                <i class="bi bi-arrow-left"></i> Continue Comprando
                            </a>
                        </div>

                        <div class="payment-methods">
                            <p class="payment-title">Aceptamos</p>
                            <div class="payment-icons">
                                <i class="bi bi-credit-card"></i>
                                <i class="bi bi-paypal"></i>
                                <i class="bi bi-wallet2"></i>
                                <i class="bi bi-bank"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Cart Section -->
@endsection
