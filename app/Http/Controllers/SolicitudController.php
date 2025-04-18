<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Beneficiario;
use App\Models\Medicamento;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudRequest;

class SolicitudController extends Controller
{
    public function index()
    {
        $beneficiarios = Beneficiario::all();
        $medicamentos = Medicamento::all();
        $equipments = Equipment::all();
        $solicitudes = Solicitud::with('beneficiario')->get();
    
        return view('admin.solicitudes.index', compact('beneficiarios', 'solicitudes'));
    }

    
    public function create()
    {
        $beneficiarios = Beneficiario::all();
        $equipos = Equipment::all();
        $medicamentos = Medicamento::all();
        return view('admin.solicitudes.create', compact('beneficiarios', 'equipos', 'medicamentos'));
    }
    
    public function store(SolicitudRequest $request)
    {
        $solicitud = Solicitud::create($request->validated());
        
        // Asignar equipos
        if ($request->input('equipos')) {
            $solicitud->equipos()->attach($request->input('equipos'));
        }
        
        // Asignar medicamentos
        if ($request->input('medicamentos')) {
            $solicitud->medicamentos()->attach($request->input('medicamentos'));
        }
        
        return redirect()->route('solicitudes.create')->with('success', 'Solicitud registrada');
    }
        

    public function show(Solicitud $solicitud)
    {
        return view('admin.solicitudes.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud)
    {
        $beneficiarios = Beneficiario::all();
        return view('admin.solicitudes.edit', compact('solicitud', 'beneficiarios'));
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'beneficiario_id' => 'required|exists:beneficiarios,id',
            'tipo_solicitud' => 'required|in:comodato,donativo',
            'Tipo' => 'required|in: equipments',
            'categoria' => 'required|in:medicamentos',
            'descripcion' => 'nullable|string',
        ]);

        $solicitud->update($request->all());

        return redirect()->route('admin.solicitudes.index')->with('success', 'Solicitud actualizada con éxito.');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('admin.solicitudes.index')->with('success', 'Solicitud eliminada con éxito.');
    }
}
