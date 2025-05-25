<?php

namespace App\Http\Controllers;

use App\Models\SolicitudMedicamento;
use App\Models\Beneficiario;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class SolicitudMedicamentoController extends Controller
{
    /**
     * Muestra todas las solicitudes de medicamentos
     */
    public function index()
    {
        $solicitudesMedicamentos = SolicitudMedicamento::with(['beneficiario', 'medicamento'])->get();
        return view('admin.solicitud_medicamento.index', compact('solicitudesMedicamentos'));
    }

    /**
     * Muestra el formulario para crear una nueva solicitud de medicamento
     */
    public function create()
    {
        $beneficiarios = Beneficiario::all();
        $medicamentos = Medicamento::all();
        return view('admin.solicitud_medicamento.create', compact('beneficiarios', 'medicamentos'));
    }

    /**
     * Registra una nueva solicitud de medicamento
     */
    public function store(Request $request)
    {
        $request->validate([
            'beneficiario_id' => 'required|exists:beneficiario,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        SolicitudMedicamento::create($request->all());

        return redirect()->route('solicitud_medicamento.index')
                         ->with('success', 'Solicitud de medicamento registrada correctamente.');
    }

    /**
     * Muestra una solicitud específica
     */
    public function show(SolicitudMedicamento $solicitudMedicamento)
    {
        return view('admin.solicitud_medicamento.show', compact('solicitudMedicamento'));
    }

    /**
     * Muestra el formulario para editar una solicitud de medicamento
     */
    public function edit(SolicitudMedicamento $solicitudMedicamento)
    {
        $beneficiarios = Beneficiario::all();
        $medicamentos = Medicamento::all();
        return view('admin.solicitud_medicamento.edit', compact('solicitudMedicamento', 'beneficiarios', 'medicamentos'));
    }

    /**
     * Actualiza una solicitud de medicamento
     */
    public function update(Request $request, SolicitudMedicamento $solicitudMedicamento)
    {
        $request->validate([
            'beneficiario_id' => 'required|exists:beneficiario,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $solicitudMedicamento->update($request->all());

        return redirect()->route('solicitud_medicamento.index')
                         ->with('success', 'Solicitud de medicamento actualizada correctamente.');
    }

    /**
     * Elimina una solicitud de medicamento
     */
    public function destroy(SolicitudMedicamento $solicitudMedicamento)
    {
        $solicitudMedicamento->delete();
        return redirect()->route('solicitud_medicamento.index')
                         ->with('success', 'Solicitud de medicamento eliminada correctamente.');
    }
}
