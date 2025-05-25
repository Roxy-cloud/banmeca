<?php

namespace App\Http\Controllers;
use App\Models\Medicamento;
use App\Models\Componente;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentes = Componente::all(); // Obtener todas las Componentes
        return view('admin.componentes.index', compact('componentes')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.componentes.create'); // Mostrar formulario de creación
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
        ]);

        // Crear la nueva Componente
        Componente::create($request->all());

        return redirect()->route('componentes.index')
                         ->with('success', 'Componente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function show(Componente $componente)
    {
        return view('admin.componentes.show', compact('componente')); // Mostrar detalles de la Componente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function edit(Componente $componente)
    {
        return view('admin.componentes.edit', compact('componente')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Componente $componente)
    {
        // Validar los datos del formulario
        $request->validate([
            'Nombre' => 'required|string|max:255',

        ]);

        // Actualizar la Componente existente
        $componente->update($request->all());

        return redirect()->route('componentes.index')
                         ->with('success', 'Componente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        $componente->delete();

        return redirect()->route('componentes.index')
                         ->with('success', 'Componente eliminado con éxito.');
    }
}
