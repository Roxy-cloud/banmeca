<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donaciones = Donacion::all();
        return response()->json($donaciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_Benefactor' => 'required|exists:benefactors,id', // Asegura que el benefactor exista
            'Fecha_Donacion' => 'required|date',
            'Descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $donacion = Donacion::create($validator->validated());
        return response()->json($donacion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Donacion $donacion)
    {
        return response()->json($donacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donacion $donacion)
    {
        $validator = Validator::make($request->all(), [
            'ID_Benefactor' => 'exists:benefactors,id', // Asegura que el benefactor exista
            'Fecha_Donacion' => 'date',
            'Descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $donacion->update($validator->validated());
        return response()->json($donacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donacion $donacion)
    {
        $donacion->delete();
        return response()->json(null, 204);
    }
}
