@php
    $nombre   = $ajuste->nombre ?? 'Mercado';
    $logo     = !empty($ajuste->logo) ? asset('storage/' . $ajuste->logo) : null;
    $comision = isset($ajuste->comision) ? (float) $ajuste->comision : 0;
    $comisionTxt = rtrim(rtrim(number_format($comision, 2, ',', ''), '0'), ',');
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $nombre }} — Comprá y vendé en un solo lugar</title>
    <meta name="description" content="Marketplace donde cualquiera puede publicar sus productos y comprar los de otros vendedores. Registro gratuito, carrito, favoritos y pago con PayPal.">
    @if($logo)
        <link rel="icon" href="{{ $logo }}">
        <link rel="apple-touch-icon" href="{{ $logo }}">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --mk-acento: #5687b9;      /* acento de la tienda */
            --mk-oscuro: #3f6a96;
            --mk-profundo: #1f3a56;
            --mk-noche: #14263a;
            --mk-claro: #a9c6e3;
            --mk-suave: #eaf1f8;
            --mk-fondo: #f6f9fc;
            --mk-pizarra: #1e293b;
        }
        html { scroll-behavior: smooth; scroll-padding-top: 76px; }
        body { font-family: 'Segoe UI', system-ui, -apple-system, Roboto, sans-serif; color: var(--mk-pizarra); background: #fff; }
        h1, h2, h3, h4, .navbar-brand { font-family: 'Montserrat', 'Segoe UI', sans-serif; }

        .landing-nav { background: rgba(255,255,255,.96); backdrop-filter: blur(10px); box-shadow: 0 2px 20px rgba(0,0,0,.07); }
        .landing-nav .navbar-brand { color: var(--mk-oscuro); font-weight: 800; }
        .landing-nav .nav-link { color: var(--mk-pizarra); font-weight: 600; }
        .landing-nav .nav-link:hover { color: var(--mk-acento); }

        .btn-mk { background: var(--mk-acento); color: #fff; border: 0; border-radius: 50px; padding: 13px 30px; font-weight: 600; text-decoration: none; transition: all .25s; display: inline-block; }
        .btn-mk:hover { background: var(--mk-oscuro); color: #fff; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(86,135,185,.4); }
        .btn-mk-outline { background: transparent; color: #fff; border: 2px solid rgba(255,255,255,.4); border-radius: 50px; padding: 11px 30px; font-weight: 600; text-decoration: none; transition: all .25s; display: inline-block; }
        .btn-mk-outline:hover { border-color: #fff; background: rgba(255,255,255,.1); color: #fff; }
        .btn-primary { --bs-btn-bg: var(--mk-acento); --bs-btn-border-color: var(--mk-acento); --bs-btn-hover-bg: var(--mk-oscuro); --bs-btn-hover-border-color: var(--mk-oscuro); --bs-btn-active-bg: var(--mk-oscuro); --bs-btn-active-border-color: var(--mk-oscuro); }
        .btn-outline-primary { --bs-btn-color: var(--mk-acento); --bs-btn-border-color: var(--mk-acento); --bs-btn-hover-bg: var(--mk-acento); --bs-btn-hover-border-color: var(--mk-acento); --bs-btn-active-bg: var(--mk-acento); }

        .landing-hero { background: linear-gradient(135deg, var(--mk-noche) 0%, var(--mk-profundo) 55%, var(--mk-oscuro) 100%); padding: 130px 0 90px; position: relative; overflow: hidden; }
        .landing-hero::before { content: ''; position: absolute; width: 600px; height: 600px; top: -220px; right: -200px; background: radial-gradient(circle, rgba(169,198,227,.22) 0%, transparent 70%); }
        .landing-hero::after { content: ''; position: absolute; width: 420px; height: 420px; bottom: -140px; left: -110px; background: radial-gradient(circle, rgba(86,135,185,.25) 0%, transparent 70%); }
        .landing-badge { display: inline-block; background: rgba(169,198,227,.16); border: 1px solid rgba(169,198,227,.4); color: var(--mk-claro); padding: 6px 16px; border-radius: 20px; font-size: 14px; margin-bottom: 22px; }
        .landing-hero h1 { font-size: clamp(2.1rem, 5vw, 3.3rem); font-weight: 800; line-height: 1.12; color: #fff; }
        .landing-hero h1 span { color: var(--mk-claro); }

        /* Mock */
        .mock { background: #fff; border-radius: 16px; box-shadow: 0 30px 70px rgba(0,0,0,.45); overflow: hidden; color: var(--mk-pizarra); }
        .mock-bar { background: #eef2f7; padding: 10px 14px; display: flex; gap: 6px; align-items: center; border-bottom: 1px solid #dde4ee; }
        .mock-bar i { width: 10px; height: 10px; border-radius: 50%; background: #c3cedc; display: inline-block; }
        .mock-bar small { margin-left: 10px; color: #64748b; font-size: 12px; }
        .mock-body { padding: 18px; }
        .mock-search { background: var(--mk-fondo); border: 1px solid #dde4ee; border-radius: 50px; padding: 8px 16px; font-size: 13px; color: #94a3b8; margin-bottom: 14px; }
        .mock-prod { border: 1px solid #e3e9f2; border-radius: 12px; padding: 10px; text-align: center; height: 100%; }
        .mock-img { background: linear-gradient(135deg, var(--mk-suave), #d3e2f1); border-radius: 8px; height: 72px; display: flex; align-items: center; justify-content: center; color: var(--mk-acento); font-size: 26px; margin-bottom: 8px; }
        .mock-prod .n { font-size: 12px; font-weight: 600; }
        .mock-prod .v { font-size: 11px; color: #64748b; }
        .mock-prod .p { font-size: 13px; font-weight: 700; color: var(--mk-oscuro); }
        .mock-caption { font-size: 12px; color: rgba(255,255,255,.6); margin-top: 12px; }

        .landing-section { padding: 80px 0; }
        .section-tag { display: inline-block; background: rgba(86,135,185,.14); color: var(--mk-oscuro); padding: 7px 16px; border-radius: 50px; font-weight: 600; font-size: 14px; margin-bottom: 14px; }
        .bg-mk-fondo { background: var(--mk-fondo); }

        .persona-card { background: #fff; border: 1px solid #dde7f2; border-radius: 18px; padding: 32px; height: 100%; }
        .persona-card .ic { width: 56px; height: 56px; border-radius: 14px; background: var(--mk-suave); color: var(--mk-acento); display: flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 16px; }
        .persona-card ul { list-style: none; padding: 0; margin: 0; }
        .persona-card li { margin-bottom: 10px; color: #475569; }
        .persona-card li i { color: var(--mk-acento); margin-right: 8px; }

        .feature-card { padding: 28px; border-radius: 16px; border: 1px solid #e5eaf1; background: #fff; height: 100%; transition: all .3s; }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(86,135,185,.18); border-color: var(--mk-acento); }
        .feature-icon { width: 58px; height: 58px; border-radius: 16px; background: linear-gradient(135deg, var(--mk-suave), #d3e2f1); color: var(--mk-acento); display: flex; align-items: center; justify-content: center; font-size: 26px; margin-bottom: 16px; }

        .paso-num { width: 48px; height: 48px; border-radius: 50%; background: var(--mk-acento); color: #fff; font-weight: 800; display: flex; align-items: center; justify-content: center; flex: none; }
        .paso { display: flex; gap: 16px; margin-bottom: 22px; }

        .landing-dark { background: linear-gradient(135deg, var(--mk-noche) 0%, var(--mk-profundo) 100%); color: #fff; }
        .dark-card { background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.14); border-radius: 16px; padding: 26px; height: 100%; }
        .dark-card i.big { font-size: 32px; color: var(--mk-claro); }

        .cat-chip { display: inline-block; background: #fff; border: 1px solid #d3e2f1; color: var(--mk-oscuro); border-radius: 50px; padding: 9px 20px; font-weight: 600; margin: 5px; }

        .accordion-button:not(.collapsed) { background: var(--mk-suave); color: var(--mk-profundo); box-shadow: none; }
        .accordion-button:focus { box-shadow: 0 0 0 .2rem rgba(86,135,185,.25); }

        .landing-cta { background: linear-gradient(135deg, var(--mk-oscuro) 0%, var(--mk-profundo) 100%); color: #fff; }
        .landing-footer { background: var(--mk-noche); }

        @media (max-width: 575.98px) { .landing-section { padding: 56px 0; } }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg landing-nav fixed-top">
    <div class="container">
        <a class="navbar-brand fs-4 d-flex align-items-center" href="#inicio">
            @if($logo)
                <img src="{{ $logo }}" alt="" height="32" class="me-2">
            @else
                <i class="bi bi-shop me-2"></i>
            @endif
            {{ $nombre }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLanding" aria-label="Menú">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navLanding">
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="#para-quien">Comprar y vender</a></li>
                <li class="nav-item"><a class="nav-link" href="#funciones">Funciones</a></li>
                <li class="nav-item"><a class="nav-link" href="#como-funciona">Cómo funciona</a></li>
                <li class="nav-item"><a class="nav-link" href="#pagos">Pagos</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">Preguntas</a></li>
            </ul>
            <div class="d-flex flex-wrap gap-2 mt-3 mt-lg-0">
                <a href="{{ route('web.index') }}" class="btn btn-outline-primary rounded-pill px-3">
                    <i class="bi bi-bag me-1"></i>Ver la tienda
                </a>
                <a href="{{ route('web.authloginweb') }}" class="btn btn-outline-primary rounded-pill px-3">Ingresar</a>
                <a href="{{ route('web.authregistroweb') }}" class="btn btn-primary rounded-pill px-3">
                    <i class="bi bi-person-plus me-1"></i>Crear cuenta
                </a>
            </div>
        </div>
    </div>
</nav>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5 shadow"
     style="z-index:9999;width:min(92vw,520px)">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5 shadow"
     style="z-index:9999;width:min(92vw,520px)">
    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- HERO --}}
<section id="inicio" class="landing-hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="landing-badge"><i class="bi bi-shop-window me-1"></i>Marketplace para comprar y vender</span>
                <h1 class="mb-4">Comprá lo que necesitás. <span>Vendé lo que tenés.</span></h1>
                <p class="text-white-50 fs-5 mb-4">
                    En {{ $nombre }} cualquier persona puede publicar sus productos y, al mismo tiempo,
                    comprar los de otros vendedores. Una sola cuenta para las dos cosas.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('web.index') }}" class="btn-mk"><i class="bi bi-bag me-2"></i>Ir a la tienda</a>
                    <a href="{{ route('web.authregistroweb') }}" class="btn-mk-outline"><i class="bi bi-megaphone me-2"></i>Quiero vender</a>
                </div>
                <div class="d-flex flex-wrap gap-4 mt-4 text-white-50 small">
                    <span><i class="bi bi-person-check me-1"></i>Registro con una cuenta</span>
                    <span><i class="bi bi-heart me-1"></i>Favoritos y carrito</span>
                    <span><i class="bi bi-paypal me-1"></i>Pago con PayPal</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mock">
                    <div class="mock-bar"><i></i><i></i><i></i><small>{{ $nombre }} · Tienda</small></div>
                    <div class="mock-body">
                        <div class="mock-search"><i class="bi bi-search me-2"></i>Buscar productos...</div>
                        <div class="row g-3">
                            @foreach([
                                ['bi-headphones', 'Producto de ejemplo', 'Vendedor 1', '$ 12.500'],
                                ['bi-watch', 'Producto de ejemplo', 'Vendedor 2', '$ 8.900'],
                                ['bi-camera', 'Producto de ejemplo', 'Vendedor 3', '$ 24.000'],
                                ['bi-book', 'Producto de ejemplo', 'Vendedor 1', '$ 3.200'],
                                ['bi-bicycle', 'Producto de ejemplo', 'Vendedor 4', '$ 45.000'],
                                ['bi-lamp', 'Producto de ejemplo', 'Vendedor 2', '$ 6.700'],
                            ] as $p)
                            <div class="col-4">
                                <div class="mock-prod">
                                    <div class="mock-img"><i class="bi {{ $p[0] }}"></i></div>
                                    <div class="n">{{ $p[1] }}</div>
                                    <div class="v">{{ $p[2] }}</div>
                                    <div class="p">{{ $p[3] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mock-caption text-center">Vista de ejemplo con datos ficticios.</div>
            </div>
        </div>
    </div>
</section>

{{-- COMPRAR Y VENDER --}}
<section id="para-quien" class="landing-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Para compradores y vendedores</span>
            <h2 class="fw-bold fs-1 mb-3">Una cuenta, dos formas de usarla</h2>
            <p class="text-muted fs-5 mx-auto" style="max-width:640px">
                No hay que elegir un perfil: con tu cuenta podés comprar y vender cuando quieras.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="persona-card">
                    <div class="ic"><i class="bi bi-bag-heart"></i></div>
                    <h4 class="fw-bold">Si querés comprar</h4>
                    <p class="text-muted">Encontrá productos de distintos vendedores y comprá en pocos pasos.</p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i>Buscá por nombre o descripción</li>
                        <li><i class="bi bi-check-circle-fill"></i>Mirá el detalle, las fotos y quién vende</li>
                        <li><i class="bi bi-check-circle-fill"></i>Guardá tus favoritos y armá tu carrito</li>
                        <li><i class="bi bi-check-circle-fill"></i>Pagá con PayPal</li>
                    </ul>
                    <a href="{{ route('web.index') }}" class="btn btn-outline-primary rounded-pill px-4 mt-3">Explorar la tienda</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="persona-card">
                    <div class="ic"><i class="bi bi-shop"></i></div>
                    <h4 class="fw-bold">Si querés vender</h4>
                    <p class="text-muted">Publicá tus productos desde tu propio panel y seguí tus ventas.</p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i>Cargá productos con descripción, precio, stock y fotos</li>
                        <li><i class="bi bi-check-circle-fill"></i>Editá o dá de baja tus publicaciones cuando quieras</li>
                        <li><i class="bi bi-check-circle-fill"></i>Mirá tus ventas en “Mis ventas”</li>
                        <li><i class="bi bi-check-circle-fill"></i>Cada pedido se separa por vendedor</li>
                    </ul>
                    <a href="{{ route('web.authregistroweb') }}" class="btn btn-primary rounded-pill px-4 mt-3">Crear mi cuenta</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FUNCIONES --}}
<section id="funciones" class="landing-section bg-mk-fondo">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Funciones</span>
            <h2 class="fw-bold fs-1 mb-3">Lo que podés hacer</h2>
        </div>
        <div class="row g-4">
            @foreach([
                ['bi-search', 'Búsqueda de productos', 'Buscador en la tienda por nombre o descripción corta.'],
                ['bi-card-image', 'Fichas con varias fotos', 'Cada producto puede tener varias imágenes, descripción y datos del vendedor.'],
                ['bi-heart', 'Favoritos', 'Guardá los productos que te interesan para volver a verlos.'],
                ['bi-cart3', 'Carrito de compras', 'Sumá productos, cambiá cantidades y finalizá la compra.'],
                ['bi-box-seam', 'Mis productos', 'Panel del vendedor para publicar, editar y eliminar tus propias publicaciones.'],
                ['bi-receipt', 'Mis ventas', 'Consultá las ventas de tus productos con el detalle de cada una.'],
            ] as $f)
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi {{ $f[0] }}"></i></div>
                    <h5 class="fw-bold mb-2">{{ $f[1] }}</h5>
                    <p class="text-muted mb-0">{{ $f[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CÓMO FUNCIONA --}}
<section id="como-funciona" class="landing-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Cómo funciona</span>
            <h2 class="fw-bold fs-1">Empezar es simple</h2>
        </div>
        <div class="row g-5">
            <div class="col-md-6">
                <h5 class="fw-bold mb-4"><i class="bi bi-bag-heart text-primary me-2"></i>Para comprar</h5>
                @foreach([
                    ['Creá tu cuenta', 'Completá tus datos una sola vez.'],
                    ['Elegí tus productos', 'Buscá, mirá el detalle y agregalos al carrito.'],
                    ['Pagá y listo', 'Finalizás la compra con PayPal.'],
                ] as $i => $p)
                <div class="paso">
                    <div class="paso-num">{{ $i + 1 }}</div>
                    <div><div class="fw-bold">{{ $p[0] }}</div><div class="text-muted">{{ $p[1] }}</div></div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h5 class="fw-bold mb-4"><i class="bi bi-shop text-primary me-2"></i>Para vender</h5>
                @foreach([
                    ['Usá la misma cuenta', 'No hace falta un registro aparte.'],
                    ['Publicá tus productos', 'Desde “Mis productos” cargás datos, precio, stock y fotos.'],
                    ['Seguí tus ventas', 'Las compras de tus productos aparecen en “Mis ventas”.'],
                ] as $i => $p)
                <div class="paso">
                    <div class="paso-num">{{ $i + 1 }}</div>
                    <div><div class="fw-bold">{{ $p[0] }}</div><div class="text-muted">{{ $p[1] }}</div></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- PAGOS Y COMISIÓN --}}
<section id="pagos" class="landing-section landing-dark">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold fs-1 mb-3">Pagos y comisión, a la vista</h2>
            <p class="fs-5 mx-auto" style="max-width:640px;opacity:.85">Sin letra chica: sabés cómo se paga y cuánto se descuenta por cada venta.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <div class="dark-card">
                    <i class="bi bi-paypal big d-block mb-2"></i>
                    <h5 class="fw-bold">Pago con PayPal</h5>
                    <p class="mb-0" style="opacity:.85">Los compradores finalizan su compra con PayPal desde el carrito.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="dark-card">
                    <i class="bi bi-percent big d-block mb-2"></i>
                    <h5 class="fw-bold">
                        @if($comision > 0)
                            Comisión por venta: {{ $comisionTxt }}%
                        @else
                            Comisión por venta
                        @endif
                    </h5>
                    <p class="mb-0" style="opacity:.85">
                        @if($comision > 0)
                            Se aplica sobre cada venta y la ves calculada en tu panel “Mis ventas”.
                        @else
                            La comisión vigente se calcula sobre cada venta y la ves en tu panel “Mis ventas”.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CATEGORÍAS (solo si hay) --}}
@if($categorias->isNotEmpty())
<section id="categorias" class="landing-section bg-mk-fondo">
    <div class="container text-center">
        <span class="section-tag">Categorías</span>
        <h2 class="fw-bold fs-1 mb-4">Explorá por categoría</h2>
        <div>
            @foreach($categorias as $cat)
                <a href="{{ route('web.buscar', ['producto_buscado' => $cat->nombre]) }}" class="cat-chip text-decoration-none">{{ $cat->nombre }}</a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- FAQ --}}
<section id="faq" class="landing-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag">Preguntas frecuentes</span>
            <h2 class="fw-bold fs-1">Antes de empezar</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAcc">
                    @foreach([
                        ['¿Necesito dos cuentas para comprar y vender?', 'No. Con una sola cuenta podés comprar y publicar tus propios productos.'],
                        ['¿Cómo publico un producto?', 'Iniciá sesión y entrá a “Mis productos”: ahí cargás los datos, el precio, el stock y las fotos. Podés editarlo o eliminarlo cuando quieras.'],
                        ['¿Cómo se paga?', 'Los compradores pagan con PayPal al finalizar el carrito.'],
                        ['¿Hay comisión por vender?', $comision > 0 ? 'Sí, ' . $comisionTxt . '% sobre cada venta. En “Mis ventas” ves el detalle calculado.' : 'La plataforma aplica una comisión sobre cada venta. En “Mis ventas” ves el detalle calculado.'],
                        ['¿Qué pasa si compro productos de varios vendedores?', 'El pedido se separa por vendedor, así cada uno ve solo las ventas de sus productos.'],
                    ] as $i => $q)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $i ? 'collapsed' : '' }} fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">{{ $q[0] }}</button>
                        </h2>
                        <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i ? '' : 'show' }}" data-bs-parent="#faqAcc">
                            <div class="accordion-body text-muted">{{ $q[1] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA FINAL --}}
<section class="landing-cta text-center" style="padding:64px 0">
    <div class="container">
        <h2 class="fw-bold mb-3">Empezá hoy en {{ $nombre }}</h2>
        <p class="fs-5 mb-4" style="opacity:.9">Mirá lo que hay en la tienda o creá tu cuenta para vender.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('web.index') }}" class="btn btn-light btn-lg px-5 fw-bold" style="color:var(--mk-profundo)"><i class="bi bi-bag me-2"></i>Ir a la tienda</a>
            <a href="{{ route('web.authregistroweb') }}" class="btn btn-outline-light btn-lg px-4"><i class="bi bi-person-plus me-2"></i>Crear cuenta</a>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="landing-footer py-4">
    <div class="container">
        <div class="row align-items-center gy-2">
            <div class="col-md-6 text-white">
                <i class="bi bi-shop me-2" style="color:var(--mk-claro)"></i>
                <strong>{{ $nombre }}</strong> &copy; {{ date('Y') }}
                @if(!empty($ajuste->email))
                    <span class="text-white-50 ms-3 small"><i class="bi bi-envelope me-1"></i>{{ $ajuste->email }}</span>
                @endif
                @if(!empty($ajuste->telefono))
                    <span class="text-white-50 ms-3 small"><i class="bi bi-telephone me-1"></i>{{ $ajuste->telefono }}</span>
                @endif
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('web.index') }}" class="text-white-50 text-decoration-none me-3"><i class="bi bi-bag me-1"></i>Tienda</a>
                <a href="{{ route('web.authloginweb') }}" class="text-white-50 text-decoration-none"><i class="bi bi-box-arrow-in-right me-1"></i>Ingresar</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
