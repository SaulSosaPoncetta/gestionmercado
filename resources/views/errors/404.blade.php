@extends('layouts.web')

@section('contenido')

<!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="text-center">
          <div class="error-icon mb-4" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi bi-exclamation-circle"></i>
          </div>

          <h1 class="error-code mb-4" data-aos="fade-up" data-aos-delay="300">404</h1>

          <h2 class="error-title mb-3" data-aos="fade-up" data-aos-delay="400">Oops! Pagina no encontrada</h2>

          <p class="error-text mb-4" data-aos="fade-up" data-aos-delay="500">
            La página que estás buscando podría haber sido eliminada, haber cambiado de nombre o estar temporalmente no disponible.
          </p>
    
          <!--
          <div class="search-box mb-4" data-aos="fade-up" data-aos-delay="600">
            <form action="#" class="search-form">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for pages..." aria-label="Search">
                <button class="btn search-btn" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div> -->
          
          <div class="error-action" data-aos="fade-up" data-aos-delay="700">
            <a href="/" class="btn btn-primary">Volver a Inicio</a>
          </div>
        </div>

      </div>

    </section>
    
<!-- Final Error 404 Section -->



@endsection