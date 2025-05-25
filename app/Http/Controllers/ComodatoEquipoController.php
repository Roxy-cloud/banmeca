<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComodatoEquipo;
use App\Models\Beneficiario;
use App\Models\Equipment;

class ComodatoEquipoController extends Controller
{
    public function index()
    {
        $comodato = ComodatoEquipo::all();
        return view('comodato_equipments.index', compact('comodato'));
    }

    public function create()
    {
        $beneficiarios = Beneficiario::all();
        $equipments = Equipment::all();
        return view('comodato_equipments.create', compact('beneficiarios', 'equipments'));
    }

    public function store(Request $request)
    {
        ComodatoEquipo::create($request->all());
        return redirect()->route('comodato_equipments.index')->with('success', 'Comodato registrada correctamente.');
    }

    public function show($id)
    {
        $comodato = ComodatoEquipo::findOrFail($id);
        return view('comodato_equipments.show', compact('comodato'));
    }
}
