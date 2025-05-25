<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Benefactor;
use App\Models\Medicamento;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InsumoController extends Controller
{
  public function index()
{
    $insumosCount = Insumo::count();

    // Obtener medicamentos y equipos agrupados por fecha y benefactor
    $insumosAgrupados = Medicamento::with('benefactor')
        ->orderBy('Fecha_Donacion', 'desc')
        ->get()
        ->groupBy(['Fecha_Donacion', 'benefactor.Nombre']);

    $equipmentsAgrupados = Equipment::with('benefactor')
        ->orderBy('Fecha_Donacion', 'desc')
        ->get()
        ->groupBy(['Fecha_Donacion', 'benefactor.Nombre']);

    return view('admin.insumos.index', compact('insumosAgrupados', 'equipmentsAgrupados', 'insumosCount'));
}



    public function create()
    {
        return view('admin.insumos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:medicamento,equipo_medico',

        ]);

        Insumo::create($request->all());

        return redirect()->route('insumos.index')->with('success', 'Insumo registrado correctamente.');
    }

    public function edit(Insumo $insumo)
    {
        return view('admin.insumos.edit', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $request->validate([
            'tipo' => 'required|in:medicamento,equipo_medico',

        ]);
        
        $insumo->update($request->all());        

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
    }



    public function generarComprobantePorFecha(Request $request)
{
    $fecha = $request->input('fecha', now()->toDateString());

    // Verificar si hay insumos en la fecha seleccionada
    $benefactores = Benefactor::whereHas('medicamentos', function ($query) use ($fecha) {
        $query->whereDate('Fecha_Donacion', $fecha);
    })->orWhereHas('equipments', function ($query) use ($fecha) {
        $query->whereDate('Fecha_Donacion', $fecha);
    })->get();

    if ($benefactores->isEmpty()) {
        return redirect()->route('insumos.index')->with('error', 'No hay insumos registrados en la fecha seleccionada.');
    }

    // Generar comprobante si hay registros
    $comprobantes = [];
    foreach ($benefactores as $benefactor) {
        $comprobantes[$benefactor->nombre] = [
            'medicamentos' => $benefactor->medicamentos()->whereDate('Fecha_Donacion', $fecha)->get(),
            'equipments' => $benefactor->equipments()->whereDate('Fecha_Donacion', $fecha)->get(),
        ];
    }

    $pdf = Pdf::loadView('admin.insumos.comprobante', compact('comprobantes', 'fecha'))->setPaper('letter');

    return $pdf->download("comprobante_$fecha.pdf");
}
 
    
}