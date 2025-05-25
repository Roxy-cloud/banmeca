<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonacionEquipo;
use App\Models\Beneficiario;
use App\Models\Equipment;

class DonacionEquipoController extends Controller
{
    public function index()
    {
        $donaciones = DonacionEquipo::all();
        return view('solicitud_equipments.index', compact('donaciones'));
    }

    public function create()
    {
        $beneficiarios = Beneficiario::all();
        $equipments = Equipment::all();
        return view('admin.solicitud_equipments.create', compact('beneficiarios', 'equipments'));
    }

 public function store(Request $request)
{
    $request->validate([
        'beneficiario_id' => 'required|exists:beneficiarios,id',
        'equipments.*.equipment_id' => 'required|exists:equipments,id',
        'equipments.*.cantidad' => 'required|integer|min:1',
    ]);

    foreach ($request->equipments as $equipment) {
        Donacionequipo::create([
            'beneficiario_id' => $request->beneficiario_id,
            'equipment_id' => $equipment['equipment_id'],
            'cantidad' => $equipment['cantidad'],
            'Fecha_Donacion' => now(),
        ]);
    }

    return redirect()->route('solicitud_equipments.index')->with('success', 'Donación registrada correctamente.');
}


    public function show($id)
    {
        $donacion = DonacionEquipo::findOrFail($id);
        return view('donaciones_equipments.show', compact('donacion'));
    }
}
