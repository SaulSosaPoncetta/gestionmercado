@extends('layouts.web')

@section('contenido')
    <!--Titulo de la pagina -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Mi Cuenta:</h1>

        </div>
    </div>
    <!--Fin Titulo de la pagina -->

    <!--Seccion de perfil -->
    <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu d-lg-none mb-4">
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                    <i class="bi bi-grid"></i>
                    <span>Menu</span>
                </button>
            </div>

            <div class="row g-4">
                <!-- MENU DE CUENTA -->
                <div class="col-lg-3">
                    <div class="profile-menu collapse d-lg-block" id="profileMenu">
                        <!-- INFORMACION DEL USUARIO -->
                        <div class="user-info" data-aos="fade-right">
                            <div class="user-avatar">
                                <img src="assets/img/person/person-f-1.webp" alt="Profile" loading="lazy">
                                <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                            </div>
                            <h4>{{ Auth::user()->name }}</h4>
                            <div class="user-status">
                                <i class="bi bi-award"></i>
                                <span>{{ Auth::user()->roles()->pluck('name')->implode(', ') }}</span>
                            </div>
                        </div>

                        <!-- MENU LATERAL NAVEGACION -->
                        <nav class="menu-nav">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                                        <i class="bi bi-box-seam"></i>
                                        <span>Pedidos</span>
                                        <span class="badge">{{ $total_pedidos }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                                        <i class="bi bi-heart"></i>
                                        <span>Favoritos</span>
                                        <span class="badge">{{ $total_favoritos }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#wallet">
                                        <i class="bi bi-wallet2"></i>
                                        <span>Métodos de Pago</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">
                                        <i class="bi bi-star"></i>
                                        <span>Reseñas</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#addresses">
                                        <i class="bi bi-geo-alt"></i>
                                        <span>Domicilios de envio</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings">
                                        <i class="bi bi-gear"></i>
                                        <span>Datos de Cuenta</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="menu-footer">
                                @if (Auth::check())
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100 mb-2">Cerrar Sesión</button>
                                    </form>
                                @endif

                                <a href="#" class="help-link">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Centro de Ayuda</span>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- Area de contenido -->
                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <!-- MIS PEDIDOS -->
                            <div class="tab-pane fade show active" id="orders">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Pedidos</h2>
                                    <div class="header-actions">
                                        <div class="search-box">
                                            <i class="bi bi-search"></i>
                                            <input type="text" placeholder="Buscar pedidos...">
                                        </div>
                                        <div class="dropdown">
                                            <button class="filter-btn" data-bs-toggle="dropdown">
                                                <i class="bi bi-funnel"></i>
                                                <span>Filtrar por...</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Todas </a></li>
                                                <li><a class="dropdown-item" href="#">Procesadas</a></li>
                                                <li><a class="dropdown-item" href="#">Enviadas</a></li>
                                                <li><a class="dropdown-item" href="#">Entregadas</a></li>
                                                <li><a class="dropdown-item" href="#">Canceladas</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="orders-grid">
                                    <!-- Tarjeta de Pedidos -->
                                    @foreach ($pedidos as $pedido)
                                        <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Pedido ID:</span>
                                                    <span class="value">{{ $pedido->id }}</span>
                                                </div>
                                                <div class="order-date">Fecha del Pedido:
                                                    {{ $pedido->created_at->format('M j, Y') }}</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    @php
                                                        $cont_items = 0;
                                                    @endphp
                                                    @foreach ($pedido->detalles as $detalle)
                                                        @php
                                                            $imagen_producto = $detalle->producto->imagenes->first();
                                                            $imagen = $imagen_producto->imagen ?? '';
                                                            $cont_items++;
                                                        @endphp
                                                        <img src="{{ asset('storage/' . $imagen) }}" alt="Product"
                                                            loading="lazy">
                                                    @endforeach

                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Estado del Pedido:</span>
                                                        <span class="status processing">{{ $pedido->estado_orden }}</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Productos</span>
                                                        <span>{{ $cont_items }}</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span
                                                            class="price">{{ $pedido->divisa . ' ' . $pedido->total }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                    data-bs-target="#tracking{{ $pedido->id }}"
                                                    aria-expanded="false">Seguimiento del
                                                    Pedido</button>
                                                <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                    data-bs-target="#details{{ $pedido->id }}"
                                                    aria-expanded="false">Ver Detalle del pedido</button>

                                            </div>

                                            <!-- Orden de pedido Tracking -->
                                            <div class="collapse tracking-info" id="tracking{{ $pedido->id }}">
                                                <div class="tracking-timeline">
                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>

                                                        @if ($pedido->estado_orden == 'Enviado')
                                                            <div class="timeline-content">
                                                                <h5>Orden enviada</h5>
                                                                <p>Su pedido ha sido enviado y está en camino
                                                                    {!! $pedido->nota !!}</p>
                                                                <span class="timeline-date">Fecha de envio:
                                                                    {!! $pedido->updated_at->format('M j, Y') !!}</span>
                                                            </div>
                                                        @else
                                                            <div class="timeline-item active">
                                                                <div class="timeline-icon">
                                                                    <i class="bi bi-box-seam"></i>
                                                                </div>
                                                                <div class="timeline-content">
                                                                    <h5>Procesando el envio</h5>
                                                                    <p>Sus artículos están siendo procesados para el envío,
                                                                        espere notificacion por email.</p>
                                                                    <span class="timeline-date">Fecha de registro:
                                                                        {!! $pedido->created_at->format('M j, Y') !!}</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="timeline-item">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Orden creada</h5>
                                                            <p>Fecha compra: {!! $pedido->created_at->format('M j, Y') !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Detalles del pedido -->
                                            <div class="collapse order-details" id="details{{ $pedido->id }}">
                                                <div class="details-content">
                                                    <div class="detail-section">
                                                        <h5>Información del Pedido</h5>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Productos <span>{{ $cont_items }}</span></h5>
                                                        <div class="order-items">
                                                            @foreach ($pedido->detalles as $detalle)
                                                                @php
                                                                    $imagen_producto = $detalle->producto->imagenes->first();
                                                                    $imagen = $imagen_producto->imagen ?? '';
                                                                    $cont_items++;
                                                                @endphp
                                                                <div class="item">
                                                                    <img src="{{ asset('storage/' . $imagen) }}"
                                                                        alt="Product" loading="lazy">
                                                                    <div class="item-info">
                                                                        <h6>{{ $detalle->producto->nombre }}</h6>
                                                                        <div class="item-meta">
                                                                            <span class="sku">Codigo:
                                                                                {{ $detalle->producto->id }}</span>
                                                                            <span class="qty">Cant Unidades:
                                                                                {{ $detalle->cantidad }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-price">Precio Unitario:
                                                                        {{ $detalle->producto->precio_venta }} / Subtotal
                                                                        Item:{{ $pedido->moneda . ' ' . ($subTotalItem = $detalle->cantidad * $detalle->producto->precio_venta) }}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Precio Detalles</h5>
                                                        <div class="price-breakdown">
                                                            <div class="price-row">
                                                                <span>Subtotal</span>
                                                                <span>{{ $pedido->divisa . ' ' . $pedido->total }}</span>
                                                            </div>
                                                            <!--
                                                                <div class="price-row">
                                                                    <span>Envío</span>
                                                                    <span>{{-- $pedido->divisa . ' ' . $pedido->envio --}}</span>
                                                                </div>
                                                                <div class="price-row">
                                                                    <span>Impuesto</span>
                                                                    <span>{{-- $pedido->divisa . ' ' . $pedido->impuesto --}}</span>
                                                                </div> -->
                                                            <div class="price-row total">
                                                                <span>Total Pedido</span>
                                                                <span>{{ $pedido->divisa . ' ' . $pedido->total }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Datos de Envío</h5>
                                                        <div class="address-info">
                                                            <p> Cliente: {{ $pedido->nombre_cliente }}</p>
                                                            <br>
                                                            <p> Domicilio de envio: {{ $pedido->direccion_envio }}</p>
                                                            <br>
                                                            <p class="contact">Telefono: {{ $pedido->telefono_cliente }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                            <!-- FAVORITOS -->
                            <div class="tab-pane fade" id="wishlist">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Favoritos</h2>
                                    <div class="header-actions">
                                        <button type="submit" class="btn btn-primary w-100 mb-2">Agregar Todo al
                                            Carrito</button>

                                    </div>
                                </div>

                                <div class="wishlist-grid">
                                    <!-- Wishlist Item 1 -->
                                    <div class="wishlist-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="wishlist-image">
                                            <img src="assets/img/product/product-1.webp" alt="Product" loading="lazy">
                                            <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="sale-badge">-20%</div>
                                        </div>
                                        <div class="wishlist-content">
                                            <h4>Lorem ipsum dolor sit amet</h4>
                                            <div class="product-meta">
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    <span>(4.5)</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current">$79.99</span>
                                                    <span class="original">$99.99</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add-cart">Add to Cart</button>
                                        </div>
                                    </div>

                                    <!-- Wishlist Item 2 -->
                                    <div class="wishlist-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="wishlist-image">
                                            <img src="assets/img/product/product-2.webp" alt="Product" loading="lazy">
                                            <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                        <div class="wishlist-content">
                                            <h4>Consectetur adipiscing elit</h4>
                                            <div class="product-meta">
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <span>(4.0)</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current">$149.99</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-add-cart">Add to Cart</button>
                                        </div>
                                    </div>

                                    <!-- Wishlist Item 3 -->
                                    <div class="wishlist-card" data-aos="fade-up" data-aos-delay="300">
                                        <div class="wishlist-image">
                                            <img src="assets/img/product/product-3.webp" alt="Product" loading="lazy">
                                            <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="out-of-stock-badge">Out of Stock</div>
                                        </div>
                                        <div class="wishlist-content">
                                            <h4>Sed do eiusmod tempor</h4>
                                            <div class="product-meta">
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <span>(5.0)</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current">$199.99</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-notify">Notify When Available</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- METODOS DE PAGO -->
                            <div class="tab-pane fade" id="wallet">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Metodos de Pago</h2>
                                    <div class="header-actions">
                                        <!-- <button type="submit" class="btn btn-primary w-100 mb-2"> <i
                                                    class="bi bi-plus-lg"></i> Agregar Nueva Tarjeta</button> -->
                                    </div>
                                </div>

                                <div class="payment-cards-grid">
                                    <!-- Payment Card 1 -->
                                    <div class="payment-card default" data-aos="fade-up" data-aos-delay="100">
                                        <div class="card-header">
                                            <i class="bi bi-credit-card"></i>
                                            <div class="card-badges">
                                                <span class="default-badge">Default</span>
                                                <span class="card-type">Visa</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-number">•••• •••• •••• 4589</div>
                                            <div class="card-info">
                                                <span>Expires 09/2026</span>
                                            </div>
                                        </div>
                                        <div class="card-actions">
                                            <!--<button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>-->
                                            <!--<button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button> -->
                                        </div>
                                    </div>

                                    <!-- Payment Card 2 -->
                                    <div class="payment-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="card-header">
                                            <i class="bi bi-credit-card"></i>
                                            <div class="card-badges">
                                                <span class="card-type">Mastercard</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-number">•••• •••• •••• 7821</div>
                                            <div class="card-info">
                                                <span>Expires 05/2025</span>
                                            </div>
                                        </div>
                                        <div class="card-actions">
                                            <button type="button" class="btn-edit">
                                                <!--<i class="bi bi-pencil"></i>
                                                    Edit
                                                </button> -->
                                                <button type="button" class="btn-remove">
                                                    <!--<i class="bi bi-trash"></i>
                                                    Remove
                                                </button> -->
                                                    <!-- <button type="button" class="btn-make-default">Make Default</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- RESEÑAS -->
                            <div class="tab-pane fade" id="reviews">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Reseñas</h2>
                                    <div class="header-actions">
                                        <div class="dropdown">
                                            <button class="filter-btn" data-bs-toggle="dropdown">
                                                <i class="bi bi-funnel"></i>
                                                <span>Ordenar por: Reciente</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Recientes</a></li>
                                                <li><a class="dropdown-item" href="#">Mayor Calificación</a></li>
                                                <li><a class="dropdown-item" href="#">Menor Calificación</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-grid">
                                    <!-- Review Card 1 -->
                                    <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="review-header">
                                            <img src="assets/img/product/product-1.webp" alt="Product"
                                                class="product-image" loading="lazy">
                                            <div class="review-meta">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <span>(5.0)</span>
                                                </div>
                                                <div class="review-date">Reviewed on Feb 15, 2025</div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="review-footer">
                                            <!-- <button type="button" class="btn-edit">Edit Review</button>
                                                <button type="button" class="btn-delete">Delete</button>-->
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- DOMICILIOS DE ENVIO -->
                            <div class="tab-pane fade" id="addresses">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Domicilios de envio:</h2>
                                    <div class="header-actions">
                                        <!-- <button type="submit" class="btn btn-primary w-100 mb-2"> <i
                                                    class="bi bi-plus-lg"></i> Agregar Nuevo Domicilio</button> -->
                                    </div>
                                </div>

                                <div class="addresses-grid">
                                    <!-- DOMICILIO 1 -->
                                    <div class="address-card default" data-aos="fade-up" data-aos-delay="100">
                                        <div class="card-header">
                                            <h4>Particular</h4>
                                            <span class="default-badge">Default</span>
                                        </div>
                                        <div class="card-body">
                                            <p class="address-text">123 Main Street<br>Apt 4B<br>New York, NY
                                                10001<br>United States</p>
                                            <div class="contact-info">
                                                <div><i class="bi bi-person"></i> Sarah Anderson</div>
                                                <div><i class="bi bi-telephone"></i> +1 (555) 123-4567</div>
                                            </div>
                                        </div>
                                        <div class="card-actions">
                                            <!-- <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button> -->
                                        </div>
                                    </div>

                                    <!-- DOMICILIO 2 -->
                                    <div class="address-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="card-header">
                                            <h4>Trabajo</h4>
                                        </div>
                                        <div class="card-body">
                                            <p class="address-text">456 Business Ave<br>Suite 200<br>San Francisco, CA
                                                94107<br>United States</p>
                                            <div class="contact-info">
                                                <div><i class="bi bi-person"></i> Sarah Anderson</div>
                                                <div><i class="bi bi-telephone"></i> +1 (555) 987-6543</div>
                                            </div>
                                        </div>
                                        <div class="card-actions">
                                            <!-- <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                                <button type="button" class="btn-make-default">Make Default</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos de la cuenta -->
                            <div class="tab-pane fade" id="settings">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Configuraciones de Cuenta</h2>
                                </div>

                                <div class="settings-content">
                                    <!-- Informacion Personal -->
                                    <div class="settings-section" data-aos="fade-up">
                                        <h3>Información Personal</h3>
                                        <form class="php-email-form settings-form">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="firstName" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="firstName"
                                                        value=" " required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="lastName" class="form-label">Apellido</label>
                                                    <input type="text" class="form-control" id="lastName"
                                                        value=" " required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        value=" " required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Telefono</label>
                                                    <input type="tel" class="form-control" id="phone"
                                                        value=" ">
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <!-- <button type="submit" class="btn-save">Guardar Cambios</button> -->
                                            </div>

                                            <!--<div class="loading">Cargando</div>
                                                <div class="error-message"></div>
                                                <div class="sent-message">¡Tus cambios han sido guardados exitosamente!</div> -->
                                        </form>
                                    </div>

                                    <!-- Email  -->
                                    <div class="settings-section" data-aos="fade-up" data-aos-delay="100">
                                        <h3>Preferencias de Mail</h3>
                                        <div class="preferences-list">
                                            <div class="preference-item">
                                                <div class="preference-info">
                                                    <h4>Actualizaciones de Pedidos</h4>
                                                    <p>Recibo notificaciones sobre el estado de mis pedidos</p>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <!-- <input class="form-check-input" type="checkbox" id="orderUpdates"
                                                            checked=""> -->
                                                </div>
                                            </div>

                                            <div class="preference-item">
                                                <div class="preference-info">
                                                    <h4>Promociones</h4>
                                                    <p>Recibo correos sobre nuevas promociones y ofertas</p>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <!--<input class="form-check-input" type="checkbox" id="promotions">-->
                                                </div>
                                            </div>

                                            <div class="preference-item">
                                                <div class="preference-info">
                                                    <h4>Correo de Noticias</h4>
                                                    <p>Suscripto al boletín semanal</p>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <!-- <input class="form-check-input" type="checkbox" id="newsletter"
                                                            checked="">-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Seguridad -->
                                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                        <h3>Seguridad</h3>
                                        <form class="php-email-form settings-form">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="currentPassword" class="form-label">Protegido por
                                                        contraseña</label>

                                                </div>

                                            </div>


                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Account Section -->
@endsection
