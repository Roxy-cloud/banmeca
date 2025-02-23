<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Medicamento;
use App\Models\EquipoMedico;
use App\Models\Beneficiario;
use App\Models\Responsable;

class SolicitudController extends Controller
{
    public function create()
    {
        $beneficiarios = Beneficiario::all();
        $responsables = Responsable::all();

        return view('solicitudes.create', compact('beneficiarios', 'medicamentos', 'equiposMedicos', 'responsables'));
    }

    public function store(Request $request)
    {
        $solicitud = Insumo::create($request->only(['tipo', 'beneficiario_id', 'medicamento_id', 'equipomedico_id','responsable_id']));

        if ($request->insumo_tipo == 'medicamento') {
            Medicamento::create([
                'nombre' => $request->medicamento_nombre,
                'cantidad' => $request->medicamento_dosis,
                'insumo_id' => $solicitud->id
            ]);
        } elseif ($request->insumo_tipo == 'equipo_medico') {
            EquipoMedico::create([
                'nombre' => $request->equipo_medico_nombre,
                'descripcion' => $request->equipo_medico_descripcion,
                'insumo_id' => $solicitud->id
            ]);
        }

        return redirect()->route('Solicitud.index')->with('success', 'Solicitud enviada correctamente');
    }
}
