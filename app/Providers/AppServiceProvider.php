<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;   // 👈 ESTA LÍNEA FALTABA
use Illuminate\Support\Facades\View;
use App\Models\Ajuste;

class AppServiceProvider extends ServiceProvider
{
	    public function register(): void
		        {
				    }

	        public function boot(): void
			    {
				            if (Schema::hasTable('ajustes')) {
						                $ajuste = Ajuste::first();
								            View::share('ajuste', $ajuste);
								        }
					        }
}
