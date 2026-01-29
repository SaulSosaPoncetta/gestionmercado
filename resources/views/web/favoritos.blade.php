@extends('layouts.web')

@section('contenido')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Mis Favoritos: {{ $productoFavoritos->count() }} </h1>
            <nav class="breadcrumbs">
                <!--<ol>
                        <li><a href="index.html">Inicio</a></li>
                        <li class="current">Account</li>>
                    </ol> -->
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Account Section -->
    <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
                <!-- Profile Menu -->
                <div class="col-lg-3">
                    <div class="profile-menu collapse d-lg-block" id="profileMenu">
                        <!-- User Info -->
                        <div class="user-info" data-aos="fade-right">
                            <div class="user-avatar">
                                <img src="{{ asset('storage/' . $ajuste->logo) }}" alt="Profile" loading="lazy">
                                <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                            </div>
                            <h4>{{ Auth::user()->name }}</h4>
                            <div class="user-status">
                                <i class="bi bi-award"></i>
                                <span>{{ Auth::user()->roles()->pluck('name')->implode(', ') }}</span>
                            </div>
                        </div>

                        <!-- Navigation Menu -->
                        <!--  <nav class="menu-nav">
                                <ul class="nav flex-column" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                                            <i class="bi bi-heart"></i>
                                            <span>Total de favoritos <span class="badge"></span></span>
                                            
                                        </a>
                                </ul>
                            </nav> -->
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <!-- Favoritos Tab -->
                            <div class="tab-pane fade show active" id="orders">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Productos:</h2>
                                </div>
                                <div class="wishlist-grid">
                                    @foreach ($productoFavoritos as $favorito)
                                        <div class="wishlist-card" data-aos="fade-up" data-aos-delay="100">
                                            <div class="wishlist-image">
                                                @php
                                                    $imagen_producto = $favorito->producto->imagenes->first();
                                                    $imagen = $imagen_producto->imagen ?? '';
                                                @endphp
                                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" loading="lazy">

                                                <form action="{{ route('web.favoritos.destroy', $favorito->id) }}"
                                                    method="POST" id="miFormulario{{ $favorito->id }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-remove" type="submit" aria-label="Remove from wishlist" onclick="preguntar{{ $favorito->id }}(event)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $favorito->id }}(event) {
                                                        event.preventDefault();

                                                        Swal.fire({
                                                            title: '¿Desea eliminar este articulo de favoritos?',
                                                            icon: 'question',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            cancelButtonColor: '#a5161d',
                                                            denyButtonColor: '#270a0a',
                                                            denyButtonText: 'Cancelar',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('miFormulario{{ $favorito->id }}').submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                                <div class="sale-badge">{{ $favorito->producto->stock }} disponibles</div>
                                            </div>
                                            <div class="wishlist-content">
                                                <a href="{{route('web.detalle_producto', $favorito->producto->id)}}"><h4>{{ $favorito->producto->nombre }}</h4></a>
                                                
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
                                                        <span
                                                            class="current">{{ $ajuste->moneda . ' ' . $favorito->producto->precio_venta }}</span>
                                                        <!-- <span class="original">$99.99</span> -->
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-add-cart"> Añadir al Carrito</button>
                                            </div>
                                        </div>
                                    @endforeach






                                    <!-- Wishlist Item 1 -->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </section> 0.....-
@endsection
