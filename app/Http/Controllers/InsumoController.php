<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Donacion;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::with('donacion')->get(); // Obtener todos los insumos con sus donaciones
        return view('insumos.index', compact('insumos')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donaciones = Donacion::all(); // Obtener todas las donaciones para el formulario
        return view('insumos.create', compact('donaciones')); // Mostrar formulario de creación
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
            'donacions_id' => 'required|exists:donacions,id',
            'Nombre_Insumo' => 'required|string|max:255',
            'Tipo_Insumo' => 'required|in:Medicamento,Equipo Médico',
        ]);

        // Crear el nuevo insumo
        Insumo::create($request->all());

        return redirect()->route('insumos.index')
                         ->with('success', 'Insumo creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        return view('insumos.show', compact('insumo')); // Mostrar detalles del insumo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        $donaciones = Donacion::all(); // Obtener todas las donaciones para el formulario de edición
        return view('insumos.edit', compact('insumo', 'donaciones')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        // Validar los datos del formulario
        $request->validate([
            'donacions_id' => 'required|exists:donacions,id',
            'Nombre_Insumo' => 'required|string|max:255',
            'Tipo_Insumo' => 'required|in:Medicamento,Equipo Médico',
        ]);

        // Actualizar el insumo existente
        $insumo->update($request->all());

        return redirect()->route('insumos.index')
                         ->with('success', 'Insumo actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index')
                         ->with('success', 'Insumo eliminado con éxito.');
    }
}

