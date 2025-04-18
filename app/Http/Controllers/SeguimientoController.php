<?php

namespace App\Http\Controllers;
use App\Models\SeguimientoSolicitud;
use App\Models\Solicitud;
use App\Http\Requests\SeguimientoRequest;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
{
    $solicitud = Solicitud::find($id);
    return view('seguimiento.create', compact('solicitud'));
}

public function store(SeguimientoRequest $request)
{
    SeguimientoSolicitud::create([
        'solicitud_id' => $request->input('solicitud_id'),
        'estado' => $request->input('estado'),
        'observaciones' => $request->input('observaciones'),
        'usuario_id' => auth()->id()
    ]);

    return redirect()->route('solicitudes.index')->with('success', 'Seguimiento actualizado');
}

    /**
     * Display the specified resource.
     */
    public function show(seguimiento_solicitud $seguimiento_solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(seguimiento_solicitud $seguimiento_solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, seguimiento_solicitud $seguimiento_solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(seguimiento_solicitud $seguimiento_solicitud)
    {
        //
    }
}
