<?php

namespace App\Http\Controllers;

use App\Models\EquipoMedico;
use App\Models\Insumo;
use Illuminate\Http\Request;

class EquipoMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EquipoMedicos = EquipoMedico::with(['insumo'])->get(); // Obtener todos los EquipoMedicos con sus relaciones
        return view('equipments.index', compact('equipments')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        return view('equipments.create', compact('insumos')); // Mostrar formulario de creación
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
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|string|max:255',
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string',
            'Existencia' => 'required|string',
            'Estado' => 'required|in:Bueno,Regular,Malo',
            'imagen' => 'nullable|string',
        ]);

        // Crear el nuevo EquipoMedico
        EquipoMedico::create($request->all());

        return redirect()->route('equipments.index')
                         ->with('success', 'EquipoMedico creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipoMedico  $EquipoMedico
     * @return \Illuminate\Http\Response
     */
    public function show(EquipoMedico $EquipoMedico)
    {
        return view('equipments.show', compact('equipments')); // Mostrar detalles del EquipoMedico
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipoMedico  $EquipoMedico
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipoMedico $EquipoMedico)
    {
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario de edición
        return view('equipments.edit', compact('equipments', 'insumos')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipoMedico  $EquipoMedico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipoMedico $EquipoMedico)
    {
        // Validar los datos del formulario
        $request->validate([
           'insumo_id' => 'required|exists:insumos,id',
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|string|max:255',
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string',
            'Existencia' => 'required|string',
            'Estado' => 'required|in:Bueno,Regular,Malo',
            'imagen' => 'nullable|string',
        ]);

        // Actualizar el EquipoMedico existente
        $EquipoMedico->update($request->all());

        return redirect()->route('equipments.index')
                         ->with('success', 'Equipo Medico actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipoMedico  $EquipoMedico
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipoMedico $EquipoMedico)
    {
        $EquipoMedico->delete();

        return redirect()->route('equipments.index')
                         ->with('success', 'Equipo Medico eliminado con éxito.');
    }
}
