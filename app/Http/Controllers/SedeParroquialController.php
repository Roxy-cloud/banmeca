<?php

namespace App\Http\Controllers;

use App\Models\SedeParroquial;
use Illuminate\Http\Request;

class SedeParroquialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedeParroquials = SedeParroquial::all(); // Obtener todos los SedeParroquials
        return view('sede_parroquials.index', compact('sedeParroquials')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sede_parroquials.create'); // Mostrar formulario de creación
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

        // Crear el nuevo SedeParroquial
        SedeParroquial::create($request->all());

        return redirect()->route('sede_parroquials.index')
                         ->with('success', 'Sede Parroquial creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SedeParroquial $sedeParroquial
     * @return \Illuminate\Http\Response
     */
    public function show(SedeParroquial $sedeParroquial)
    {
        return view('sede_parroquial.show', compact('sedeParroquial')); // Mostrar detalles del SedeParroquial
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SedeParroquial  $sedeParroquial
     * @return \Illuminate\Http\Response
     */
    public function edit(SedeParroquial $sedeParroquial)
    {
        return view('sede_parroquial.edit', compact('sedeParroquial')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SedeParroquial  $sedeParroquial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SedeParroquial $sedeParroquial)
    {
        // Validar los datos del formulario
        $request->validate([
          'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Responsable' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
        ]);

        // Actualizar el SedeParroquial
        $sedeParroquial->update($request->all());

        return redirect()->route('sede_parroquial.index')
                         ->with('success', 'Sede Parroquial actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SedeParroquial  $sedeParroquial
     * @return \Illuminate\Http\Response
     */
    public function destroy(SedeParroquial $sedeParroquial)
    {
        $sedeParroquial->delete();

        return redirect()->route('sede_parroquial.index')
                         ->with('success', 'Sede Parroquial eliminado con éxito.');
    }
}
