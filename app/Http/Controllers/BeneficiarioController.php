<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario; // Importa el modelo Beneficiario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Para validar los datos

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beneficiarios = Beneficiario::all();
        return response()->json($beneficiarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:12',
            'fechanac' => 'required|date',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|min:0ng',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Código 422 para errores de validación
        }

        $beneficiario = Beneficiario::create($validator->validated());
        return response()->json($beneficiario, 201); // Código 201 para creación exitosa
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiario $beneficiario) // Inyección de dependencia del modelo
    {
        return response()->json($beneficiario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiario $beneficiario) // Inyección de dependencia del modelo
    {
        $validator = Validator::make($request->all(), [
           'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:12',
            'fechanac' => 'required|date',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|min:0ng',
            // Agrega aquí las validaciones para otros campos
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $beneficiario->update($validator->validated());
        return response()->json($beneficiario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiario $beneficiario) // Inyección de dependencia del modelo
    {
        $beneficiario->delete();
        return response()->json(null, 204); // Código 204 para eliminación exitosa (sin contenido)
    }
}
