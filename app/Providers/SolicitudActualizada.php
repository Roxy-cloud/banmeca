<<<<<<< HEAD
<?php

namespace App\Providers;
use App\Events\EnviarNotificacionBeneficiario;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\ServiceProvider;


class SolicitudActualizada extends ServiceProvider
{ 
    use Dispatchable, SerializesModels;

    public $solicitud;
    public $estado;

    public function __construct($solicitud, $estado)
    {
        $this->solicitud = $solicitud;
        $this->estado = $estado;
    }

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

  

=======
<?php

namespace App\Providers;
use App\Events\EnviarNotificacionBeneficiario;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\ServiceProvider;


class SolicitudActualizada extends ServiceProvider
{ 
    use Dispatchable, SerializesModels;

    public $solicitud;
    public $estado;

    public function __construct($solicitud, $estado)
    {
        $this->solicitud = $solicitud;
        $this->estado = $estado;
    }

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

  

>>>>>>> e2a8b4e (Primer commit)
}