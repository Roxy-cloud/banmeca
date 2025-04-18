<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
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
        //
    }

protected $listen = [
    'App\Events\SolicitudActualizada' => [
        'App\Listeners\EnviarNotificacionBeneficiario',
    ],
];
}