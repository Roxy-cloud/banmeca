<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Medicamento;
use App\Models\Benefactor;
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
    $insumos = Insumo::with(['medicamentos', 'equipments'])->get();

    return view('admin.insumos.index', compact('insumos'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumo = Benefactor::all(); // Obtener todas las insumo para el formulario
        return view('insumos.create', compact('insumo')); // Mostrar formulario de creación
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
            'insumo_id' => 'required|exists:insumo,id',
            'benefactor_id' => 'required|exists:benefactor,id',
            'Tipo_Insumo' => 'required|in:Medicamento,Equipment',
            'Nombre' => 'required|exists:medicamento, id',
            'Tipo' => 'required|exists:equipment, id',
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

        return view('admin.insumos.show', compact('insumo')); // Mostrar detalles del insumo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        $insumo = Benefactor::all(); // Obtener todas las insumo para el formulario de edición
        return view('insumos.edit', compact('insumo')); // Mostrar formulario de edición
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
            'insumo_id' => 'required|exists:insumo,id',
            'benefactor_id' => 'required|exists:benefactor,id',
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

