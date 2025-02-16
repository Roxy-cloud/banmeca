<?php

namespace App\Http\Controllers;

use App\Models\Medicamento; // Importa el modelo Medicamento
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::with('categoria')->get(); // Carga la relación con la categoría
        return response()->json($medicamentos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_Categoria' => 'required|exists:categorias,id', // Asegura que la categoría exista
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Fecha_Vencimiento' => 'nullable|date',
            'Cantidad' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $medicamento = Medicamento::create($validator->validated());
        return response()->json($medicamento, 201); // Código 201 para creación exitosa
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        return response()->json($medicamento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $validator = Validator::make($request->all(), [
            'ID_Categoria' => 'exists:categorias,id', // Asegura que la categoría exista
            'Nombre' => 'string|max:255',
            'Descripcion' => 'nullable|string',
            'Fecha_Vencimiento' => 'nullable|date',
            'Cantidad' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $medicamento->update($validator->validated());
        return response()->json($medicamento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return response()->json(null, 204); // Código 204 para eliminación exitosa (sin contenido)
    }
}
