<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use App\Models\Benefactor;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donaciones = Donacion::with('benefactor')->get(); // Obtener todas las donaciones con sus benefactores
        return view('donaciones.index', compact('donaciones')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $benefactores = Benefactor::all(); // Obtener todos los benefactores para el formulario
        return view('donaciones.create', compact('benefactores')); // Mostrar formulario de creación
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
            'benefactor_id' => 'required|exists:benefactors,id',
            'Fecha_Donacion' => 'required|date',
            'Descripcion' => 'nullable|string',
        ]);

        // Crear la nueva donación
        Donacion::create($request->all());

        return redirect()->route('donaciones.index')
                         ->with('success', 'Donación creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function show(Donacion $donacion)
    {
        return view('donaciones.show', compact('donacion')); // Mostrar detalles de la donación
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Donacion $donacion)
    {
        $benefactores = Benefactor::all(); // Obtener todos los benefactores para el formulario de edición
        return view('donaciones.edit', compact('donacion', 'benefactores')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donacion $donacion)
    {
        // Validar los datos del formulario
        $request->validate([
            'benefactor_id' => 'required|exists:benefactors,id',
            'Fecha_Donacion' => 'required|date',
            'Descripcion' => 'nullable|string',
        ]);

        // Actualizar la donación existente
        $donacion->update($request->all());

        return redirect()->route('donaciones.index')
                         ->with('success', 'Donación actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donacion $donacion)
    {
        $donacion->delete();

        return redirect()->route('donaciones.index')
                         ->with('success', 'Donación eliminada con éxito.');
    }
}
