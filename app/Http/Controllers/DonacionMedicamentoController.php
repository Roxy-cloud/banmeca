<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Medicamento;
use App\Models\DonacionMedicamento;


class DonacionMedicamentoController extends Controller
{
       public function index()
{
    $donaciones = DonacionMedicamento::with(['beneficiario', 'medicamentos'])
        ->whereNotNull('Fecha_Donacion')
        ->orderBy('Fecha_Donacion', 'desc')
        ->get()
        ->groupBy('beneficiario_id'); // Agrupar por beneficiario

    return view('admin.donaciones_medicamentos.index', compact('donaciones'));
}


        public function create()
    {
        $beneficiarios = Beneficiario::all();
        $medicamentos = Medicamento::all();
        return view('admin.donaciones_medicamentos.create', compact('beneficiarios', 'medicamentos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'beneficiario_id' => 'required|exists:beneficiarios,id',
        'medicamentos.*.medicamento_id' => 'required|exists:medicamentos,id',
        'medicamentos.*.cantidad' => 'required|integer|min:1',
    ]);

    foreach ($request->medicamentos as $medicamento) {
        DonacionMedicamento::create([
            'beneficiario_id' => $request->beneficiario_id,
            'medicamento_id' => $medicamento['medicamento_id'],
            'cantidad' => $medicamento['cantidad'],
            'Fecha_Donacion' => now(),
        ]);
    }

    return redirect()->route('donaciones_medicamentos.index')->with('success', 'Donación registrada correctamente.');
}

public function show($id)
{
    $beneficiario = Beneficiario::findOrFail($id);

    $donaciones = DonacionMedicamento::where('beneficiario_id', $id)
        ->with('medicamentos') 
        ->orderBy('Fecha_Donacion', 'desc')
        ->get();

    if ($donaciones->isEmpty()) {
        return redirect()->route('donaciones_medicamentos.index')->with('error', 'No se encontró información de la donación.');
    }

    return view('admin.donaciones_medicamentos.show', compact('beneficiario', 'donaciones'));
}




    public function destroy(DonacionMedicamento $donacion)
    {
        $donacion->delete();

        return redirect()->route('donacion_medicamentos.index')
                         ->with('success', 'Información eliminada con éxito.');
    }
}
