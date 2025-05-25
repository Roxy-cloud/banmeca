<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DonacionEquipo;
use App\Models\ComodatoEquipo;
use App\Models\Beneficiario;
use App\Models\Equipment;
use Illuminate\Http\Request;


class SolicitudEquipmentController extends Controller
{
    /**
     * Muestra todas las solicitudes de equipos médicos
     */
public function index()
{
    $donaciones = DonacionEquipo::with(['beneficiario', 'equipment'])->get();
    $comodatos = ComodatoEquipo::with(['beneficiario', 'equipment'])->get();

    return view('admin.solicitud_equipments.index', compact('donaciones', 'comodatos'));
}


public function generarPDF($id, $tipo) {
    if ($tipo === 'donacion') {
        $solicitud = DonacionEquipo::findOrFail($id);
        $fecha = $solicitud->Fecha_Donacion;
    } else {
        $solicitud = ComodatoEquipo::findOrFail($id);
        $fecha = $solicitud->Fecha_Inicio;
    }

    $pdf = PDF::loadView('admin.solicitud_equipments.comprobante', compact('solicitud', 'tipo', 'fecha'));

    return $pdf->download('comprobante.pdf');
}





    /**
     * Muestra el formulario para crear una nueva solicitud de equipo médico
     */
    public function create()
    {
        $beneficiarios = Beneficiario::all();
        $equipments = Equipment::all();
        return view('admin.solicitud_equipments.create', compact('beneficiarios', 'equipments'));
    }

    /**
     * Registra una nueva solicitud de equipo médico
     */
   public function store(Request $request)
{
    $data = $request->validate([
        'beneficiario_id' => 'required|exists:beneficiarios,id',
        'equipment_id' => 'required|exists:equipments,id',
        'cantidad' => 'required|integer|min:1',
        'tipo_entrega' => 'required|in:donacion,comodato',
        'Fecha_Donacion' => 'nullable|date',
        'Fecha_Inicio' => 'nullable|date',
        'Fecha_Devolucion' => 'nullable|date',
    ]);

    if ($data['tipo_entrega'] === 'donacion') {
        DonacionEquipo::create([
            'beneficiario_id' => $data['beneficiario_id'],
            'equipment_id' => $data['equipment_id'],
            'cantidad' => $data['cantidad'],
            'Fecha_Donacion' => $data['Fecha_Donacion'] ?? now(), // Si no se proporciona, usa la fecha actual
        ]);
    } else {
        ComodatoEquipo::create([
            'beneficiario_id' => $data['beneficiario_id'],
            'equipment_id' => $data['equipment_id'],
            'cantidad' => $data['cantidad'],
            'Fecha_Inicio' => $data['Fecha_Inicio'] ?? now(), // Si no se proporciona, usa la fecha actual
            'Fecha_Devolucion' => $data['Fecha_Devolucion'] ?? null,
        ]);
    }

    return redirect()->route('solicitud_equipments.index')->with('success', 'Registro guardado correctamente.');

}

    /**
     * Muestra una solicitud específica
     */
   public function show($id, $tipo)
{
    if ($tipo === 'donacion') {
        $solicitud = DonacionEquipo::findOrFail($id);
    } else {
        $solicitud = ComodatoEquipo::findOrFail($id);
    }

    return view('admin.solicitud_equipments.show', compact('solicitud', 'tipo'));
}


    /**
     * Muestra el formulario para editar una solicitud de equipo médico
     */
    public function edit(SolicitudEquipment $solicitudEquipment)
    {
        $beneficiarios = Beneficiario::all();
        $equipos = Equipment::all();
        return view('admin.solicitud_equipments.edit', compact('solicitudEquipment', 'beneficiarios', 'equipos'));
    }

    /**
     * Actualiza una solicitud de equipo médico
     */
    public function update(Request $request, SolicitudEquipment $solicitudEquipment)
    {
       $request->validate([
        'beneficiario_id' => 'required|exists:beneficiarios,id',
        'equipment_id' => 'required|exists:equipments,id',
        'tipo_entrega' => 'required|in:donacion,comodato',
        'cantidad' => 'required|integer|min:1',
        ]);


        $solicitudEquipment->update($request->all());

        return redirect()->route('solicitud_equipments.index')
                         ->with('success', 'Solicitud de equipo médico actualizada correctamente.');
    }

    /**
     * Elimina una solicitud de equipo médico
     */
    public function destroy(SolicitudEquipment $solicitudEquipment)
    {
        $solicitudEquipment->delete();
        return redirect()->route('solicitud_equipments.index')
                         ->with('success', 'Solicitud de equipo médico eliminada correctamente.');
    }
}
