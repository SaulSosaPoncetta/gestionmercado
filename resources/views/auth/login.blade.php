@php
    $ajuste = App\Models\Ajuste::first();
    $imagen_logo = ($ajuste && !empty($ajuste->logo)) ? 'storage/'.$ajuste->logo : null;
    $imagen_login = ($ajuste && !empty($ajuste->imagen_login)) ? 'storage/'.$ajuste->imagen_login : null;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - eCommerce : {{ $ajuste->nombre ?? env('APP_NAME')}} </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>



<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div >
                        <a href="index.html">
                            @if ($ajuste)
                                <img src="{{ asset('storage/' .$imagen_logo ?? './assets/compiled/svg/logo.svg' )}}" style="width: 150px" alt="Logo">
                            @else
                                <img src="./assets/compiled/svg/logo.svg" style="width: 200px"alt="Logo">
                            @endif
                           
                        </a>
                    </div>
                    <br><br>
                    <h1 class="auth-title">{{ $ajuste->nombre ?? env('APP_NAME')}} - Log in</h1>
                    <p class="auth-subtitle mb-5">Inicia sesión con los datos que ingresaste durante el registro.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" name="email" 
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Mantenme conectado.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Acceder</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">¿No tienes cuenta? <a href="auth-register.html"
                                class="font-bold">Create una.</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">¿Olvidaste tu password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <div style="background-image: url('{{ asset($imagen_login) }}');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        height: 100%;  
                        width: 100%;">

                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</body>

</html>


