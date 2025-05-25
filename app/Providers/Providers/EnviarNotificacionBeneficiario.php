<?php

namespace App\Providers;

use App\Events\SolicitudActualizada;
use Illuminate\Support\Facades\Mail;

class EnviarNotificacionBeneficiario
{
    public function handle(SolicitudActualizada $event)
    {
        Mail::to($event->solicitud->beneficiario->email)
            ->send(new \App\Mail\SolicitudActualizada($event->solicitud, $event->estado));
    }
}