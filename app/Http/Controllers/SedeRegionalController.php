<?php

namespace App\Http\Controllers;

use App\Models\SedeRegional;
use Illuminate\Http\Request;

class SedeRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedeRegionals = SedeRegional::all(); // Obtener todos los SedeRegionals
        return view('sede_regional.index', compact('sedeRegionals')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sede_regionals.create'); // Mostrar formulario de creación
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
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Responsable' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
        ]);

        // Crear el nuevo SedeRegional
        SedeRegional::create($request->all());

        return redirect()->route('sede_regionals.index')
                         ->with('success', 'Sede Regional creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SedeRegional $SedeRegional
     * @return \Illuminate\Http\Response
     */
    public function show(SedeRegional $SedeRegional)
    {
        return view('sede_regional.show', compact('SedeRegional')); // Mostrar detalles del SedeRegional
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SedeRegional  $SedeRegional
     * @return \Illuminate\Http\Response
     */
    public function edit(SedeRegional $SedeRegional)
    {
        return view('sede_regional.edit', compact('sedeRegional')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SedeRegional  $SedeRegional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SedeRegional $SedeRegional)
    {
        // Validar los datos del formulario
        $request->validate([
          'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Responsable' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
        ]);

        // Actualizar el SedeRegional
        $SedeRegional->update($request->all());

        return redirect()->route('sede_regional.index')
                         ->with('success', 'Sede Regional actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SedeRegional  $SedeRegional
     * @return \Illuminate\Http\Response
     */
    public function destroy(SedeRegional $SedeRegional)
    {
        $SedeRegional->delete();

        return redirect()->route('sede_regional.index')
                         ->with('success', 'Sede Parroquial eliminado con éxito.');
    }
}
