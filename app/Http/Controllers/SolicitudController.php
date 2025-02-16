<?php

namespace App\Http\Controllers;

use App\Models\Solicitud; // Importa el modelo Solicitud
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::with(['medicamento', 'equipoMedico', 'sede'])->get(); // Carga relaciones
        return response()->json($solicitudes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Tipo_Solicitud' => 'required|in:Donacion_Medicina,Comodato_EquipoMedico',
            'ID_Medicamento' => 'nullable|exists:medicamentos,ID_Medicamento', // Solo si es donación de medicina
            'ID_EquipoMedico' => 'nullable|exists:equipos_medicos,ID_Equipo', // Solo si es comodato
            'ID_Sede' => 'required|exists:sedes_caritas,ID_Sede',
            'Descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $solicitud = Solicitud::create($validator->validated());
        return response()->json($solicitud, 201); // Código 201 para creación exitosa
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        return response()->json($solicitud->load(['medicamento', 'equipoMedico', 'sede'])); // Carga relaciones
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $validator = Validator::make($request->all(), [
            'Tipo_Solicitud' => 'in:Donacion_Medicina,Comodato_EquipoMedico',
            'ID_Medicamento' => 'nullable|exists:medicamentos,ID_Medicamento',
            'ID_EquipoMedico' => 'nullable|exists:equipos_medicos,ID_Equipo',
            'ID_Sede' => 'exists:sedes_caritas,ID_Sede',
            'Descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $solicitud->update($validator->validated());
        return response()->json($solicitud);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return response()->json(null, 204); // Código 204 para eliminación exitosa (sin contenido)
    }
}
