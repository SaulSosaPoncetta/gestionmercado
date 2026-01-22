@extends('layouts.web')

@section('contenido')
    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Inicio de sesión</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Inicio</a></li>
            <li class="current">Iniciar sesión</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Login Section -->
    <section id="login" class="login section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <div class="auth-container" data-aos="fade-in" data-aos-delay="200">

              <!-- Login Form -->
              <div class="auth-form login-form active">
                <div class="form-header">
                  <h3>Bienvenido de nuevo</h3>
                  <p>Inicia sesión en tu cuenta</p>
                </div>

                <form action="{{ route('web.autenticacion') }}" method="POST" class="auth-form-content">    
                    @csrf
                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control" 
                    placeholder="Direccion de Email... " required="" autocomplete="email">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" 
                    placeholder="Password" required="" autocomplete="current-password">
                    <span class="password-toggle">
                      <i class="bi bi-eye"></i>
                    </span>
                  </div>

                  <div class="form-options mb-4">
                    <div class="remember-me">
                      <input type="checkbox" id="rememberLogin">
                      <label for="rememberLogin">Recordarme</label>
                    </div>
                    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                  </div>

                  <button type="submit" class="auth-btn primary-btn mb-3">
                    Iniciar sesión
                    <i class="bi bi-arrow-right"></i>
                  </button>

                  <div class="divider">
                    <span>o</span>
                  </div>
                  
                  <!--
                  <button type="button" class="auth-btn social-btn">
                    <i class="bi bi-google"></i>
                    Continuar con Google
                  </button>
                  -->
                  
                 <div class="switch-form">
                    <span>¿No tienes una cuenta?</span>
                    <button type="button" class="switch-btn" data-target="register">Crear cuenta</button>
                  </div>
                </form>
              </div>
            
              <!-- Register Form 
              
              <div class="auth-form register-form">
                <div class="form-header">
                  <h3>Crear cuenta</h3>
                  <p>Únete a nosotros hoy y comienza</p>
                </div>

                <form class="auth-form-content">
                  <div class="name-row">
                    <div class="input-group">
                      <span class="input-icon">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="First name" required="" autocomplete="given-name">
                    </div>
                    <div class="input-group">
                      <span class="input-icon">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" class="form-control" placeholder="Last name" required="" autocomplete="family-name">
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control" placeholder="Email address" required="" autocomplete="email">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Create password" required="" autocomplete="new-password">
                    <span class="password-toggle">
                      <i class="bi bi-eye"></i>
                    </span>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-icon">
                      <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Confirm password" required="" autocomplete="new-password">
                    <span class="password-toggle">
                      <i class="bi bi-eye"></i>
                    </span>
                  </div>

                  <div class="terms-check mb-4">
                    <input type="checkbox" id="termsRegister" required="">
                    <label for="termsRegister">
                      Estoy de acuerdo con los <a href="#">Términos de servicio</a> y <a href="#">Política de privacidad</a>
                    </label>
                  </div>

                  <button type="submit" class="auth-btn primary-btn mb-3">
                    Crear Cuenta
                    <i class="bi bi-arrow-right"></i>
                  </button>

                  <div class="divider">
                    <span>or</span>
                  </div>

                  
                  <button type="button" class="auth-btn social-btn">
                    <i class="bi bi-google"></i>
                    Continuar con Google
                  </button>
                 

                  <div class="switch-form">
                    <span>¿Ya tienes tu cuenta?</span>
                    <button type="button" class="switch-btn" data-target="login">Iniciar sesión</button>
                  </div>
                </form>
              </div> 
            -->

            </div>
          </div>
        </div>

      </div>

    </section><!-- /Login Section -->

@endsection