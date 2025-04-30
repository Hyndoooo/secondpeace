<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Menetapkan route untuk API dengan prefix "api"
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Menetapkan route untuk web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Define the routes for your application.
     *
     * @return void
     */
    public function map(): void
    {
        // Register routing untuk aplikasi
        $this->boot();
    }
}