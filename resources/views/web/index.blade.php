@extends('layouts.web')

@section('contenido')
    <!--  INICIO ---------------------------------Hero Section -------------------------------------------------------- -->
    <section id="hero" class="hero section">

        <div class="hero-container">
            <div class="hero-content">
                <div class="content-wrapper" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="hero-title">Descubre productos asombrosos</h1>
                    <p class="hero-description">Explora nuestra colección de artículos premium diseñados para mejorar tu
                        estilo de vida. Desde moda hasta tecnología, encuentra todo lo que necesitas con ofertas exclusivas
                        y envío rápido.</p>
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="200">
                        <a href="#products" class="btn-primary">Comprar ahora</a>
                        <a href="#categories" class="btn-secondary">Buscar Categorias</a>
                    </div>
                    <div class="features-list" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-item">
                            <i class="bi bi-truck"></i>
                            <span>Envios Gratuitos</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-award"></i>
                            <span>Garantía de Calidad</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-headset"></i>
                            <span>Soporte 24/7 </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-visuals">
                <div class="product-showcase" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-card featured">
                        <img src="assets/img/product/product-2.webp" alt="Featured Product" class="img-fluid">
                        <div class="product-badge">Mas Buscados</div>
                        <div class="product-info">
                            <h4>Nombre producto</h4>
                            <div class="price">
                                <span class="sale-price">Precio Producto oferta</span>
                                <span class="original-price">Precio de lista</span>
                            </div>
                        </div>
                    </div>

                    <div class="product-grid">
                        <div class="product-mini" data-aos="zoom-in" data-aos-delay="400">
                            <img src="assets/img/product/product-3.webp" alt="Product" class="img-fluid">
                            <span class="mini-price">$89</span>
                        </div>
                        <div class="product-mini" data-aos="zoom-in" data-aos-delay="500">
                            <img src="assets/img/product/product-5.webp" alt="Product" class="img-fluid">
                            <span class="mini-price">$149</span>
                        </div>
                    </div>
                </div>

                <div class="floating-elements"> <!-- Acceso al carrito flotante-->
                    <div class="floating-icon cart" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-cart3"></i>
                        <span class="notification-dot">3</span>
                    </div>
                    <div class="floating-icon wishlist" data-aos="fade-up" data-aos-delay="700">
                        <!-- Acceso a favoritos flotante-->
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="floating-icon search" data-aos="fade-up" data-aos-delay="800">
                        <!-- Acceso a lupa flotante-->
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ---------------------------------------------/ Fin Hero Section ----------------- -->

    <!--------------------- Promo Cards Section --------------------->
    <section id="promo-cards" class="promo-cards section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="category-featured" data-aos="fade-right" data-aos-delay="200">
                        <div class="category-image">
                            <img src="assets/img/product/product-f-2.webp" alt="Women's Collection" class="img-fluid">
                        </div>
                        <div class="category-content">
                            <span class="category-tag">Tendencia</span>
                            <h2>Nueva Colección</h2>
                            <p>
                                Descubre nuestras últimas novedades, diseñadas para el estilo de vida moderno. Moda
                                elegante, cómoda y sustentable para cada ocasión.</p>
                            <a href="#" class="btn-shop">Explorar Colección <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="row gy-4">

                        <div class="col-xl-6">
                            <div class="category-card cat-men" data-aos="fade-up" data-aos-delay="300">
                                <div class="category-image">
                                    <img src="assets/img/product/product-m-5.webp" alt="Men's Fashion" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Indumentaria Masculina</h4>
                                    <p>242 products</p>
                                    <a href="#" class="card-link">Comprar Ahora <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="category-card cat-kids" data-aos="fade-up" data-aos-delay="400">
                                <div class="category-image">
                                    <img src="assets/img/product/product-8.webp" alt="Kid's Fashion" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Indumentaria Infantil</h4>
                                    <p>185 productos</p>
                                    <a href="#" class="card-link">Comprar Ahora <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="category-card cat-cosmetics" data-aos="fade-up" data-aos-delay="500">
                                <div class="category-image">
                                    <img src="assets/img/product/product-3.webp" alt="Cosmetics" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Productos bellos</h4>
                                    <p>127 productos</p>
                                    <a href="#" class="card-link">Comprar Ahora <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="category-card cat-accessories" data-aos="fade-up" data-aos-delay="600">
                                <div class="category-image">
                                    <img src="assets/img/product/product-12.webp" alt="Accessories" class="img-fluid">
                                </div>
                                <div class="category-content">
                                    <h4>Accesorios</h4>
                                    <p>308 productos</p>
                                    <a href="#" class="card-link">Comprar Ahora <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--------------------- Fin Promo Cards Section --------------------->

    <!--------------------- Seccion de los mas vendidos --------------------->
    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Los más vendidos</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">

                <!-- Producto 1 -- Unidades Limitadas -->
                @foreach ($productos as $producto)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">

                                @php
                                    $imagen_producto = $producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                                <!-- menu de tres opciones en card de producto -->
                                <div class="product-badge">Ultimas Unidades</div>
                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                    loading="lazy">

                                <div class="product-actions"> <!-- Agrega un producto a favoritos -->
                                    <form action="{{ route('web.favoritos.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <button type="submit" class="action-btn wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>

                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>

                                    <a class="action-btn quickview-btn" href="{{ url('producto/' . $producto->id) }}">
                                        <!-- hace zoom en foto de producto -->
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                                <button class="cart-btn">Agregar al carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Nombre del Producto : <br> {{ $producto->nombre }}</div>
                                <h4 class="product-name"><a href="{{ url('producto/' . $producto->id) }}">Descripcion
                                        corta:
                                        {{ $producto->descripcion_corta }}</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="rating-count">(24)</span>
                                </div>
                                <div class="product-price">Precio: {{ $ajuste->moneda . ' ' . $producto->precio_venta }}
                                </div>
                                <div>
                                    <span class="badge bg-danger">Stock: {{ $producto->stock }} unidades disponibles</span>
                                </div>
                                <!-- <div class="color-swatches">
                              <span class="swatch active" style="background-color: #2563eb;"></span>
                              <span class="swatch" style="background-color: #059669;"></span>
                              <span class="swatch" style="background-color: #dc2626;"></span>
                            </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($productos->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                            {{ $productos->total() }} resultados
                            {{ $productos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @endif
                <!-- Fin Producto 1 -->

                <!-- Producto 2  - productos 25 % off -->
                @foreach ($productos as $producto)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                @php
                                    $imagen_producto = $producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                                <div class="product-badge sale-badge">25% Off</div>
                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                    loading="lazy">

                                <div class="product-actions"> <!-- Agrega un producto a favoritos -->
                                    <form action="{{ route('web.favoritos.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <button type="submit" class="action-btn wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>

                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>

                                    <a class="action-btn quickview-btn" href="{{ url('producto/' . $producto->id) }}">
                                        <!-- hace zoom en foto de producto -->
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                                <button class="cart-btn">Agregar al carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Nombre del Producto</div>
                                <h4 class="product-name"><a href="product-details.html">Descripcion corta:</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <span class="rating-count">(38)</span>
                                </div>

                                <div class="product-price">
                                    <span class="old-price">$240.00</span>

                                    <span class="current-price">$180.00</span>
                                </div>
                                <!-- <div class="color-swatches">
                              <span class="swatch active" style="background-color: #1f2937;"></span>
                              <span class="swatch" style="background-color: #f59e0b;"></span>
                              <span class="swatch" style="background-color: #8b5cf6;"></span>
                            </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach
                                @if ($productos->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                            {{ $productos->total() }} resultados
                            {{ $productos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @endif
                <!-- Fin Producto 2 -->

                <!-- Producto 3 - Productos Free Shipping -->
                @foreach ($productos as $producto)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                @php
                                    $imagen_producto = $producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                                <div class="product-badge sale-badge">Envio Gratis</div>
                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                    loading="lazy">
                                <div class="product-actions"> <!-- Agrega un producto a favoritos -->
                                    <form action="{{ route('web.favoritos.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <button type="submit" class="action-btn wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>

                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>

                                    <a class="action-btn quickview-btn" href="{{ url('producto/' . $producto->id) }}">
                                        <!-- hace zoom en foto de producto -->
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                                <button class="cart-btn">Agregar al carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Nombre del Producto</div>
                                <h4 class="product-name"><a href="product-details.html">Descripcion corta:</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="rating-count">(12)</span>
                                </div>
                                <div class="product-price">$95.00
                                </div>
                                <!--<div class="color-swatches">
                              <span class="swatch active" style="background-color: #ef4444;"></span>
                              <span class="swatch" style="background-color: #06b6d4;"></span>
                              <span class="swatch" style="background-color: #10b981;"></span>
                            </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach
                                @if ($productos->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                            {{ $productos->total() }} resultados
                            {{ $productos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @endif
                <!-- Fin Producto 3 -->

                <!-- Producto 4  - Ultima Unidad -->
                @foreach ($productos as $producto)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-image">
                                @php
                                    $imagen_producto = $producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                                <div class="product-badge trending-badge">TENDENCIA</div>
                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                    loading="lazy">
                                <div class="product-actions"> <!-- Agrega un producto a favoritos -->
                                    <form action="{{ route('web.favoritos.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <button type="submit" class="action-btn wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>

                                    <button class="action-btn compare-btn">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>

                                    <a class="action-btn quickview-btn" href="{{ url('producto/' . $producto->id) }}">
                                        <!-- hace zoom en foto de producto -->
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                                <button class="cart-btn">Agregar al carrito</button>
                            </div>
                            <div class="product-info">
                                <div class="product-category">Nombre del Producto</div>
                                <h4 class="product-name"><a href="product-details.html">Descripcion corta:</a></h4>
                                <div class="product-rating">
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="rating-count">(56)</span>
                                </div>
                                <div class="product-price">$165.00</div>
                                <!-- <div class="color-swatches">
                              <span class="swatch" style="background-color: #64748b;"></span>
                              <span class="swatch active" style="background-color: #7c3aed;"></span>
                              <span class="swatch" style="background-color: #f59e0b;"></span>
                            </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach
                                @if ($productos->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <div class="text-muted">
                            Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                            {{ $productos->total() }} resultados
                            {{ $productos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @endif
                <!-- Fin Producto 4 -->

            </div>

        </div>

    </section>
    <!--------------------- Fin Mas Buscados Seccion --------------------->

    <!--------------------- Cards Section --------------------->
    <section id="cards" class="cards section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-category">
                        <h3 class="category-title">
                            <i class="bi bi-fire"></i> Tendencia Ahora
                        </h3>
                        <div class="product-list">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-1.webp" alt="Premium Leather Tote"
                                        class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-new">New</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span>(24)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$87.50</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-3.webp" alt="Statement Earrings"
                                        class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(41)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$39.99</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-5.webp" alt="Organic Cotton Shirt"
                                        class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <span>(18)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$45.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-category">
                        <h3 class="category-title">
                            <i class="bi bi-award"></i> Mas Buscados
                        </h3>
                        <div class="product-list">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-2.webp" alt="Slim Fit Denim" class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-sale">-15%</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(87)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$68.00</span>
                                        <span class="old-price">$80.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-6.webp" alt="Designer Handbag"
                                        class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span>(56)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$129.99</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-8.webp" alt="Leather Crossbody"
                                        class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(112)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$95.50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="product-category">
                        <h3 class="category-title">
                            <i class="bi bi-star"></i> Artículos Destacados
                        </h3>
                        <div class="product-list">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-7.webp" alt="Pleated Midi Skirt"
                                        class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <span>(32)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$75.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-4.webp" alt="Geometric Earrings"
                                        class="img-fluid">
                                    <div class="product-badges">
                                        <span class="badge-limited">Limited</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span>(47)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$42.99</span>
                                    </div>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="product-image">
                                    <img src="assets/img/product/product-9.webp" alt="Structured Satchel"
                                        class="img-fluid">
                                </div>
                                <div class="product-info">
                                    <h4 class="product-name">Nombre del Producto</h4>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>(64)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">$89.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!--------------------- fin Cards Seccion --------------------->

    <!--------------------- Seccion de llamado a la accion --------------------->
    <section id="call-to-action" class="call-to-action section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main-content text-center" data-aos="zoom-in" data-aos-delay="200">
                        <div class="offer-badge" data-aos="fade-down" data-aos-delay="250">
                            <span class="limited-time">Tiempo Limitado</span>
                            <span class="offer-text">50% OFF</span>
                        </div>

                        <h2 data-aos="fade-up" data-aos-delay="300"> Venta Flash Exclusiva</h2>

                        <p class="subtitle" data-aos="fade-up" data-aos-delay="350">No te pierdas nuestra mayor oferta
                            del año. Productos de primera calidad a precios inmejorables solo durante las próximas 48 horas.
                        </p>

                        <div class="countdown-wrapper" data-aos="fade-up" data-aos-delay="400">
                            <div class="countdown d-flex justify-content-center" data-count="2025/12/31">
                                <div>
                                    <h3 class="count-days"></h3>
                                    <h4>Dias</h4>
                                </div>
                                <div>
                                    <h3 class="count-hours"></h3>
                                    <h4>Horas</h4>
                                </div>
                                <div>
                                    <h3 class="count-minutes"></h3>
                                    <h4>Minutos</h4>
                                </div>
                                <div>
                                    <h3 class="count-seconds"></h3>
                                    <h4>Segundos</h4>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons" data-aos="fade-up" data-aos-delay="450">
                            <a href="#" class="btn-shop-now">Compra Ahora</a>
                            <a href="#" class="btn-view-deals">Ver Todas las Ofertas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row featured-products-row" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="assets/img/product/product-5.webp" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-45%</div>
                        </div>
                        <div class="product-details">
                            <h6>Premium Wireless Headphones</h6>
                            <div class="price-section">
                                <span class="original-price">$129</span>
                                <span class="sale-price">$71</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="rating-count">(324)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="assets/img/product/product-7.webp" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-60%</div>
                        </div>
                        <div class="product-details">
                            <h6>Smart Fitness Tracker</h6>
                            <div class="price-section">
                                <span class="original-price">$89</span>
                                <span class="sale-price">$36</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="rating-count">(198)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="assets/img/product/product-11.webp" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-35%</div>
                        </div>
                        <div class="product-details">
                            <h6>Luxury Travel Backpack</h6>
                            <div class="price-section">
                                <span class="original-price">$159</span>
                                <span class="sale-price">$103</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="rating-count">(267)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="250">
                    <div class="product-showcase">
                        <div class="product-image">
                            <img src="assets/img/product/product-1.webp" alt="Featured Product" class="img-fluid">
                            <div class="discount-badge">-55%</div>
                        </div>
                        <div class="product-details">
                            <h6>Artisan Coffee Mug Set</h6>
                            <div class="price-section">
                                <span class="original-price">$75</span>
                                <span class="sale-price">$34</span>
                            </div>
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span class="rating-count">(142)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Showcase -->
            </div>

        </div>

    </section>
    <!--------------------- Fin Seccion de llamado a la accion --------------------->
@endsection
