<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Ruta a la que se redirige después del login
     */
    public const HOME = '/admin';

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->routes(function () {

            // Rutas WEB (login, sesiones, vistas, dashboard)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Rutas API (si usás API REST)
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
