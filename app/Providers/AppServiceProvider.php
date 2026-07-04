<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // TRUCO CLAVE: Forzar HTTPS en servidores como Render
        if (config('app.env') === 'production' || isset($_SERVER['HTTPS'])) {
            URL::forceScheme('https');
        }
    }
}
