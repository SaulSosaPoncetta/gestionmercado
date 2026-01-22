@extends('layouts.web')

@section('contenido')
    <!-- Titulo de pagina -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0"> Detalle del producto:  {{$producto->nombre}}</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{url('/')}}">Inicio</a></li> 
            
            <!-- Enlace a la pagina de ventas -->
            <!-- <li><a href="{{ route('web.carrito') }}"> Mis Ventas</a></li> -->
          
          </ol>
        </nav>
      </div>
    </div><!-- Fin Titulo de pagina -->

    <!--Seccion detalle del producto -->
    <section id="product-details" class="product-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">  <!-- Galeria del producto -->
          <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="150">
            <div class="product-gallery">
              <div class="main-showcase">
                <div class="image-zoom-container"> <!-- Imagen container -->
                    @php
                        $imagen_producto = $producto->imagenes->first(); // Obtener la primera imagen del producto
                        $imagen = $imagen_producto->imagen ?? ' '; // Obtener la ruta de la imagen del producto
                    @endphp 
                  <img src="{{ asset('storage/'.$imagen) }}"  
                       alt="Product Main" 
                       class="img-fluid main-product-image drift-zoom" 
                       id="main-product-image" 
                       data-zoom="{{ asset('storage/'.$imagen) }}">  <!-- imagen zoom -->

                  <div class="image-navigation">  <!-- Navegacion de imagenes -->
                    <button class="nav-arrow prev-image image-nav-btn prev-image" type="button">
                      <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="nav-arrow next-image image-nav-btn next-image" type="button">
                      <i class="bi bi-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Miniaturas de la galeria DINAMICAS-->
               <div class="thumbnail-grid">
                @foreach ( $producto->imagenes as $item)
                  <div class="thumbnail-wrapper thumbnail-item active" 
                    data-image="{{ asset('storage/'.$item->imagen) }}">
                    <img src="{{ asset('storage/'.$item->imagen) }}" alt="View {{$loop->iteration}}" alt="Product Thumbmail"
                    class="img-fluid">
                  </div>
                @endforeach

                <!-- iMAGENES ESTATICAS EN GALERIA DE PRODUCTOS -->
                
                <!--
                <div class="thumbnail-wrapper thumbnail-item active" data-image="assets/img/product/product-details-6.webp">
                  <img src="assets/img/product/product-details-6.webp" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="assets/img/product/product-details-7.webp">
                  <img src="assets/img/product/product-details-7.webp" alt="View 2" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="assets/img/product/product-details-8.webp">
                  <img src="assets/img/product/product-details-8.webp" alt="View 3" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="assets/img/product/product-details-4.webp">
                  <img src="assets/img/product/product-details-4.webp" alt="View 4" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="assets/img/product/product-details-5.webp">
                  <img src="assets/img/product/product-details-5.webp" alt="View 5" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="assets/img/product/product-details-3.webp">
                  <img src="assets/img/product/product-details-3.webp" alt="View 6" class="img-fluid">
                </div> -->
              </div> 

            </div>
          </div> 

          <!-- Product Details -->
          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
            <div class="product-details">
              <div class="product-badge-container">
                <span class="badge-category">{{$producto->categoria->nombre}}</span> <!-- Categoria del producto -->
                <div class="rating-group">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                  </div>
                  <span class="review-text">(127 visitas)</span>
                </div>
              </div>

              <h1 class="product-name"> {{$producto->nombre}}</h1> <!-- Nombre del producto -->

              <div class="pricing-section">
                <div class="price-display">
                  <span class="sale-price">{{  $ajuste->moneda. ' '.$producto->precio_venta}}</span> <!-- Precio actual del producto -->
                  <span class="regular-price">{{  $ajuste->moneda. ' '.$producto->precio_compra}}</span> <!-- Precio con descuento del producto -->
                </div>
                <div class="savings-info">
                  <span class="save-amount">Descuento: $50.00</span>
                  <span class="discount-percent">(21% off)</span>
                </div>
              </div>

              <div class="product-description"> <!-- Descripcion corta del producto -->
                <p>{{$producto->descripcion_corta}}</p> <!-- Descripcion larga del producto -->
              </div>

              <div class="availability-status">
                <div class="stock-indicator">
                  <i class="bi bi-check-circle-fill"></i>
                  <span class="stock-text">Disponible</span>
                </div>
                <div class="quantity-left">Unicamente {{ $producto->stock }} unidades en stock</div>
              </div>

              <!-- Product Variants -->
              <div class="variant-section">
                <div class="color-selection">
                  <label class="variant-label">Colores disponibles:</label>
                  <div class="color-grid">
                    <div class="color-chip active" data-color="Midnight Black" style="background: linear-gradient(135deg, #1a1a1a, #000);">
                      <span class="selection-check"><i class="bi bi-check"></i></span>
                    </div>
                    <div class="color-chip" data-color="Pearl White" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                      <span class="selection-check"><i class="bi bi-check"></i></span>
                    </div>
                    <div class="color-chip" data-color="Ocean Blue" style="background: linear-gradient(135deg, #0066cc, #004499);">
                      <span class="selection-check"><i class="bi bi-check"></i></span>
                    </div>
                    <div class="color-chip" data-color="Forest Green" style="background: linear-gradient(135deg, #28a745, #155724);">
                      <span class="selection-check"><i class="bi bi-check"></i></span>
                    </div>
                  </div>
                  <div class="selected-variant">Seleccionado: <span>Midnight Black</span></div>
                </div>
              </div>

              <!-- Purchase Options -->
              <div class="purchase-section">
                <div class="quantity-control">
                  <label class="control-label">Cantidad:</label>
                  <div class="quantity-input-group">
                    <div class="quantity-selector">
                      <button class="quantity-btn decrease" type="button">
                        <i class="bi bi-dash"></i>
                      </button>
                      <input type="number" class="quantity-input" value="1" min="1" 
                          max="{{ $producto->stock }}"> <!-- Maximo segun stock del producto -->
                      <button class="quantity-btn increase" type="button">
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="action-buttons">
                  <a href="{{ route('web.carrito') }}" class="btn primary-action">
                    <i class="bi bi-bag-plus"></i>
                    Agregar al carrito
                  </a>

                  <!-- Boton de comprar -->
                  <!--<button class="btn secondary-action">  
                    <i class="bi bi-lightning"></i>
                    Comprar Ahora
                  </button> -->


                  <!-- Boton de añadir a la lista de favoritos -->
                  <a href="{{ route('web.dashboard') }}" class="btn icon-action" title="Add to Wishlist">
                    <i class="bi bi-heart"></i>
                  </a>
                </div>
              </div>

              <!-- Benefits List -->
              <div class="benefits-list">
                <div class="benefit-item">
                  <i class="bi bi-truck"></i>
                  <span>Entrega gratuita en pedidos superiores a $75</span>
                </div>
                <div class="benefit-item">
                  <i class="bi bi-arrow-clockwise"></i>
                  <span>Devoluciones sin complicaciones durante 45 días</span>
                </div>
                <div class="benefit-item">
                  <i class="bi bi-shield-check"></i>
                  <span>Garantía del fabricante de 3 años</span>
                </div>
                <div class="benefit-item">
                  <i class="bi bi-headset"></i>
                  <span>Soporte al cliente disponible las 24 horas del día</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="product-description">
                <p>Descripcion: {{$producto->descripcion_larga}}</p> <!-- Descripcion larga del producto -->
        </div>

        <!-- Information Tabs -->
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
          <div class="col-12">
            <div class="info-tabs-container">
              <nav class="tabs-navigation nav">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ecommerce-product-details-5-overview" type="button">Visitas</button> <!-- Boton de la pestaña de información de visitas -->
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ecommerce-product-details-5-technical" type="button">Detalles técnicos</button>  <!-- Boton de la pestaña de información técnica -->
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ecommerce-product-details-5-customer-reviews" type="button">Reseñas (127)</button> <!-- Boton de la pestaña de información de reseñas -->
              </nav>

              <div class="tab-content">
                <!-- Overview Tab -->
                <div class="tab-pane fade show active" id="ecommerce-product-details-5-overview">
                  <div class="overview-content">
                    <div class="row g-4">
                      <div class="col-lg-8">
                        <div class="content-section">
                          <h3>Descripción general del producto</h3>
                          <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>

                          <h4>Aspectos destacados</h4>
                          <div class="highlights-grid">
                            <div class="highlight-card">
                              <i class="bi bi-volume-up"></i>
                              <h5>Audio Superior </h5>
                              <p>Ut enim ad minima veniam quis nostrum exercitationem</p>
                            </div>
                            <div class="highlight-card">
                              <i class="bi bi-battery-charging"></i>
                              <h5>Batería de larga duración</h5>
                              <p>Excepteur sint occaecat cupidatat non proident</p>
                            </div>
                            <div class="highlight-card">
                              <i class="bi bi-wifi"></i>
                              <h5>Tecnologia inalambrica</h5>
                              <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                            </div>
                            <div class="highlight-card">
                              <i class="bi bi-person-check"></i>
                              <h5>Ajuste cómodo</h5>
                              <p>Lorem ipsum dolor sit amet consectetur adipiscing</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="package-contents">
                          <h4>Contenido del paquete</h4>
                          <ul class="contents-list">
                            <li><i class="bi bi-check-circle"></i>Dispositivo de audio premium</li>
                            <li><i class="bi bi-check-circle"></i>Caja de transporte premium</li>
                            <li><i class="bi bi-check-circle"></i>Cable de carga rápida USB-C</li>
                            <li><i class="bi bi-check-circle"></i>Conector de audio 3.5mm</li>
                            <li><i class="bi bi-check-circle"></i>Guia de inicio rápido</li>
                            <li><i class="bi bi-check-circle"></i>Documentación de garantía</li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Technical Details Tab -->
                <div class="tab-pane fade" id="ecommerce-product-details-5-technical">
                  <div class="technical-content">
                    <div class="row g-4">
                      <div class="col-md-6">
                        <div class="tech-group">
                          <h4> Especificaciones de audio</h4>
                          <div class="spec-table">
                            <div class="spec-row">
                              <span class="spec-name"> Rango de frecuencia</span>
                              <span class="spec-value">15Hz - 25kHz</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name"> Diámetro del motor</span>
                              <span class="spec-value">50mm Dynamic</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name"> Sensibilidad</span>
                              <span class="spec-value">98dB SPL</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name"> Impedancia</span>
                              <span class="spec-value">24 Ohm</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">THD</span>
                              <span class="spec-value">&lt; 0.5%</span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="tech-group">
                          <h4>Conectividad y energía</h4>
                          <div class="spec-table">
                            <div class="spec-row">
                              <span class="spec-name">Protocolo inalámbrico</span>
                              <span class="spec-value">Bluetooth 5.3</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Rango</span>
                              <span class="spec-value">Hasta 30ft (10m)</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name"> Capacidad de la batería</span>
                              <span class="spec-value">800mAh Li-ion</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name"> Tiempo de uso</span>
                              <span class="spec-value">35+ horas</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name"> Tiempo de carga</span>
                              <span class="spec-value">2.5 horas</span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="tech-group">
                          <h4> Dimensiones físicas</h4>
                          <div class="spec-table">
                            <div class="spec-row">
                              <span class="spec-name">Peso</span>
                              <span class="spec-value">285g</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Dimensiones</span>
                              <span class="spec-value">190 x 165 x 82mm</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Material de las orejeras</span>
                              <span class="spec-value">Memory Foam</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Banda de cabeza</span>
                              <span class="spec-value">Acero ajustable</span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="tech-group">
                          <h4>Funciones avanzadas</h4>
                          <div class="spec-table">
                            <div class="spec-row">
                              <span class="spec-name">Cancelación de ruido</span>
                              <span class="spec-value">Hybrid ANC</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Asistente de voz</span>
                              <span class="spec-value">Siri &amp; Google</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Tipo de micrófono</span>
                              <span class="spec-value">Dual Array</span>
                            </div>
                            <div class="spec-row">
                              <span class="spec-name">Calificación del agua</span>
                              <span class="spec-value">IPX5</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="ecommerce-product-details-5-customer-reviews">
                  <div class="reviews-content">
                    <div class="reviews-header">
                      <div class="rating-overview">
                        <div class="average-score">
                          <div class="score-display">4.6</div>
                          <div class="score-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                          </div>
                          <div class="total-reviews">127 opiniones de clientes</div>
                        </div>

                        <div class="rating-distribution">
                          <div class="rating-row">
                            <span class="stars-label">5★</span>
                            <div class="progress-container">
                              <div class="progress-fill" style="width: 68%;"></div>
                            </div>
                            <span class="count-label">86</span>
                          </div>
                          <div class="rating-row">
                            <span class="stars-label">4★</span>
                            <div class="progress-container">
                              <div class="progress-fill" style="width: 22%;"></div>
                            </div>
                            <span class="count-label">28</span>
                          </div>
                          <div class="rating-row">
                            <span class="stars-label">3★</span>
                            <div class="progress-container">
                              <div class="progress-fill" style="width: 6%;"></div>
                            </div>
                            <span class="count-label">8</span>
                          </div>
                          <div class="rating-row">
                            <span class="stars-label">2★</span>
                            <div class="progress-container">
                              <div class="progress-fill" style="width: 3%;"></div>
                            </div>
                            <span class="count-label">4</span>
                          </div>
                          <div class="rating-row">
                            <span class="stars-label">1★</span>
                            <div class="progress-container">
                              <div class="progress-fill" style="width: 1%;"></div>
                            </div>
                            <span class="count-label">1</span>
                          </div>
                        </div>
                      </div>

                      <div class="write-review-cta">
                        <h4>Comparte tu experiencia</h4>
                        <p>Ayuda a otros a tomar decisiones informadas.</p>
                        <button class="btn review-btn">Escribir reseña</button>
                      </div>
                    </div>

                    <div class="customer-reviews-list">
                      <div class="review-card">
                        <div class="reviewer-profile">
                          <img src="assets/img/person/person-f-3.webp" alt="Customer" class="profile-pic">
                          <div class="profile-details">
                            <div class="customer-name">Sarah Martinez</div>
                            <div class="review-meta">
                              <div class="review-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                              </div>
                              <span class="review-date">March 28, 2024</span>
                            </div>
                          </div>
                        </div>
                        <h5 class="review-headline">Outstanding audio quality and comfort</h5>
                        <div class="review-text">
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                        <div class="review-actions">
                          <button class="action-btn"><i class="bi bi-hand-thumbs-up"></i> Útil (12)</button>
                          <button class="action-btn"><i class="bi bi-chat-dots"></i> Respuesta</button>
                        </div>
                      </div>

                      <div class="review-card">
                        <div class="reviewer-profile">
                          <img src="assets/img/person/person-m-5.webp" alt="Customer" class="profile-pic">
                          <div class="profile-details">
                            <div class="customer-name">David Chen</div>
                            <div class="review-meta">
                              <div class="review-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                              </div>
                              <span class="review-date">March 15, 2024</span>
                            </div>
                          </div>
                        </div>
                        <h5 class="review-headline">Great value, minor connectivity issues</h5>
                        <div class="review-text">
                          <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Overall satisfied with the purchase.</p>
                        </div>
                        <div class="review-actions">
                          <button class="action-btn"><i class="bi bi-hand-thumbs-up"></i> Útil (8)</button>
                          <button class="action-btn"><i class="bi bi-chat-dots"></i> Respuesta</button>
                        </div>
                      </div>

                      <div class="review-card">
                        <div class="reviewer-profile">
                          <img src="assets/img/person/person-f-7.webp" alt="Customer" class="profile-pic">
                          <div class="profile-details">
                            <div class="customer-name">Cliente</div>
                            <div class="review-meta">
                              <div class="review-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                              </div>
                              <span class="review-date">Fecha, dia mes y año</span>
                            </div>
                          </div>
                        </div>
                        <h5 class="review-headline">Titulo de reseña</h5>
                        <div class="review-text">
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        </div>
                        <div class="review-actions">
                          <button class="action-btn"><i class="bi bi-hand-thumbs-up"></i> Útil (15)</button>
                          <button class="action-btn"><i class="bi bi-chat-dots"></i> Respuesta</button>
                        </div>
                      </div>

                      <div class="load-more-section">
                        <button class="btn load-more-reviews">Mostrar mas reseñas</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- /Product Details Section -->
@endsection
