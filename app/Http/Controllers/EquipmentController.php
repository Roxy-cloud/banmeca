<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Insumo;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::with('insumo')->get(); // Obtener todos los equipments con sus relaciones
        return view('admin.equipments.index', compact('equipments')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        return view('admin.equipments.create', compact('insumos')); // Mostrar formulario de creación
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
            'insumo_id' => 'required|exists:insumos,id',
            'Tipo' => 'required|string|max:255',
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string',
            'Existencia' => 'required|string',
            'Estado' => 'required|in:Bueno,Regular,Malo',
            'imagen' => 'nullable|string',
        ]);

        // Crear el nuevo equipment
        Equipment::create($request->all());

        return redirect()->route('admin.equipments.index')
                         ->with('success', 'Equipo Medico creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('admin.equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario de edición
        return view('admin.equipments.edit', compact('equipment', 'insumos')); // Pasar los insumos a la vista
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        // Validar los datos del formulario
        $request->validate([
            'insumo_id' => 'required|exists:insumos,id',
            'Tipo' => 'required|string|max:255',
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string',
            'Existencia' => 'required|string',
            'Estado' => 'required|in:Bueno,Regular,Malo',
            'imagen' => 'nullable|string',
        ]);

        // Actualizar el equipment existente
        $equipment->update($request->all());

        return redirect()->route('admin.equipments.index')
                         ->with('success', 'Equipo Medico actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('admin.equipments.index')
                         ->with('success', 'Equipo Medico eliminado con éxito.');
    }
}
