<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Requests\BeneficiarioRequest;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios = Beneficiario::all(); // Obtener todos los beneficiarios
        return view('beneficiarios.index', compact('beneficiarios')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficiarios.create'); // Mostrar formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficiarioRequest $request)
{
    if ($request->hasFile('Informe_Medico')) {
        $request->merge(['Informe_Medico' => $request->file('Informe_Medico')->store('informes_medicos')]);
    }
    $validated = $request->validate([
        'Nombre' => 'required',
        'Cedula' => 'required|unique:beneficiarios',
        'Direccion' => 'required',
        'Telefono' => 'required',
        'Informe_Medico' => 'nullable|mimes:pdf,jpg,png|max:2048'
    ]);

    if ($request->hasFile('Informe_Medico')) {
        $validated['Informe_Medico'] = $request->file('Informe_Medico')->store('informes_medicos');
    }

    Beneficiario::create($request->validated());
    return redirect()->route('beneficiarios.create')->with('success', 'Beneficiario registrado');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiario $beneficiario)
    {
        return view('beneficiarios.show', compact('beneficiario')); // Mostrar detalles del beneficiario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiario $beneficiario)
    {
        return view('beneficiarios.edit', compact('beneficiario')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiario $beneficiario)
    {
        // Validar los datos del formulario
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Cedula' => 'required|string|unique:beneficiarios,Cedula,'.$beneficiario->id.'|max:20',
            'Direccion' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
            'Informe_Medico' => 'nullable|string',
        ]);

        // Actualizar el beneficiario
        $beneficiario->update($request->all());

        return redirect()->route('beneficiarios.index')
                         ->with('success', 'Beneficiario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiario $beneficiario)
    {
        $beneficiario->delete();

        return redirect()->route('beneficiarios.index')
                         ->with('success', 'Beneficiario eliminado con éxito.');
    }
}
