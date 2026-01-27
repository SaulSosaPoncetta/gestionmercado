@extends('layouts.web')

@section('contenido')

    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2> Busqueda de productos para: {{ $query ?? '' }} </h2>
            <p> Cantidad de resultados: {{ $productos->total() }} </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">
                @if ($productos->isEmpty())
                    <div class="col-lg-12 col-md-12">
                        <div class="alert alert-warning text-center" role="alert">
                            <h4 class="alert-heading">No hay productos que coincidan con tu busqueda</h4>
                            <p>Intenta con otro término de búsqueda</p>
                        </div>
                    </div>
                @else
                    @foreach ($productos as $producto)
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item">
                                <div class="product-image">

                                    @php
                                        $imagen_producto = $producto->imagenes->first();
                                        $imagen = $imagen_producto->imagen ?? '';
                                    @endphp

                                    <div class="product-badge">Ultimas Unidades</div>
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                        loading="lazy">
                                    <div class="product-actions">
                                        <button class="action-btn wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                        <button class="action-btn compare-btn">
                                            <i class="bi bi-arrow-left-right"></i>
                                        </button>
                                        <a class="action-btn quickview-btn" href="{{ url('producto/' . $producto->id) }}">
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
                                        <span class="badge bg-danger">Stock: {{ $producto->stock }} unidades
                                            disponibles</span>
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
                @endif



                @if ($productos->hasPages()) // se muestra el link de la pagina actual y el total de paginas
                    <div class="d-flex justify-content-between align-items-center mt-4 px-3"> // se muestra el link de la pagina actual y el total de paginas
                        <div class="text-muted">
                            Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de // se muestra el primer y ultimo resultado
                            {{ $productos->total() }} resultados // se muestra el primer y ultimo resultado y el total de resultados
                        </div>
                        <div>
                            {{ $productos->appends(request()->except('page'))->links('pagination::bootstrap-4') }} //se agrega la variable request()->except('page') para evitar que se muestre el link de la pagina actual
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
