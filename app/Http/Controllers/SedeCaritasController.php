<?php

namespace App\Http\Controllers;

use App\Models\SedeCaritas; // Importa el modelo SedeCaritas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SedeCaritasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sedes = SedeCaritas::all();
        return response()->json($sedes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nombre_Sede' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Telefono' => 'nullable|string|max:20',
            'Correo_Electronico' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sede = SedeCaritas::create($validator->validated());
        return response()->json($sede, 201); // Código 201 para creación exitosa
    }

    /**
     * Display the specified resource.
     */
    public function show(SedeCaritas $sedeCaritas)
    {
        return response()->json($sedeCaritas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SedeCaritas $sedeCaritas)
    {
        $validator = Validator::make($request->all(), [
            'Nombre_Sede' => 'string|max:255',
            'Direccion' => 'string|max:255',
            'Telefono' => 'nullable|string|max:20',
            'Correo_Electronico' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sedeCaritas->update($validator->validated());
        return response()->json($sedeCaritas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SedeCaritas $sedeCaritas)
    {
        $sedeCaritas->delete();
        return response()->json(null, 204); // Código 204 para eliminación exitosa (sin contenido)
    }
}
