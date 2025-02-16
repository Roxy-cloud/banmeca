<?php

namespace App\Http\Controllers;

use App\Models\EquipoMedico; // Importa el modelo EquipoMedico
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipoMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = EquipoMedico::all();
        return response()->json($equipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Tipo' => 'required|string|max:255',
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string|max:255',
            'Estado' => 'required|in:Bueno,Regular,Malo',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $equipoMedico = EquipoMedico::create($validator->validated());
        return response()->json($equipoMedico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipoMedico $equipoMedico)
    {
        return response()->json($equipoMedico);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EquipoMedico $equipoMedico)
    {
        $validator = Validator::make($request->all(), [
            'Tipo' => 'string|max:255',
            'Marca' => 'string|max:255',
            'Modelo' => 'string|max:255',
            'Estado' => 'in:Bueno,Regular,Malo',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $equipoMedico->update($validator->validated());
        return response()->json($equipoMedico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipoMedico $equipoMedico)
    {
        $equipoMedico->delete();
        return response()->json(null, 204);
    }
}
