<?php
namespace App\Http\Controllers;
use App\Models\Solicitud;
use App\Models\SeguimientoSolicitud;
use App\Models\Equipment;
use App\Models\Medicamento;
use App\Models\Beneficiario;
use App\Models\Insumo;


class DashboardController extends Controller
{
public function index()
{
    $solicitudesTotales = Solicitud::count();
    $solicitudesPorEstado = SeguimientoSolicitud::select('estado')
        ->groupBy('estado')
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->estado => $item->count()];
        });

    $solicitudesPorTipo = Solicitud::select('Tipo')
        ->groupBy('tipo')
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->tipo => $item->count()];
        });

    return view('dashboard', compact(
        'solicitudesTotales',
        'solicitudesPorEstado',
        'solicitudesPorTipo',
        'equiposPorTipo'
    ));

    $equiposPorTipo = Equipment::select('Tipo')
    ->groupBy('Tipo')
    ->get()
    ->mapWithKeys(function ($item) {
        $disponibles = $item->equipos()->where('Estado', 'Bueno')->count();
        $enUso = $item->equipos()->where('Estado', 'Regular')->count();
        return [$item->Tipo => compact('disponibles', 'en_uso')];
    });

}
}