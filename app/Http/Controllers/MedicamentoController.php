<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Categoria;
use App\Models\Insumo;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamento::with(['categoria', 'insumo'])->get(); // Obtener todos los medicamentos con sus relaciones
        return view('medicamentos.index', compact('medicamentos')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        return view('medicamentos.create', compact('categorias', 'insumos')); // Mostrar formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'insumo_id' => 'required|exists:insumos,id',
            'Nombre' => 'required|string|max:255',
            'Laboratorio' => 'required|string|max:255',
            'Componente' => 'required|string|max:255',
            'Existencia' => 'required|string',
            'imagen' => 'nullable|string',
        ]);

        // Crear el nuevo medicamento
        Medicamento::create($request->all());

        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        return view('medicamentos.show', compact('medicamento')); // Mostrar detalles del medicamento
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario de edición
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario de edición
        return view('medicamentos.edit', compact('medicamento', 'categorias', 'insumos')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        // Validar los datos del formulario
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'insumo_id' => 'required|exists:insumos,id',
            'Nombre' => 'required|string|max:255',
            'Laboratorio' => 'required|string|max:255',
            'Componente' => 'required|string|max:255',
            'Existencia' => 'required|string',
            'imagen' => 'nullable|string',
        ]);

        // Actualizar el medicamento existente
        $medicamento->update($request->all());

        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();

        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento eliminado con éxito.');
    }
}
