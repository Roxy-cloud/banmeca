<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente; 
use App\Models\Jornada;
use App\Models\Medicamento;

class PacienteController extends Controller
{
    /**
     * Mostrar la lista de pacientes registrados.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Almacenar un nuevo paciente registrado en una jornada médica.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'cedula' => 'nullable|string|unique:pacientes,cedula|max:20',
        'edad' => 'required|integer|min:0',
        'sexo' => 'required|in:M,F',
        'categoria' => 'required|string',
        'jornada_id' => 'required|exists:jornadas,id',
        'medicamento_id' => 'required|exists:medicamentos,id',
        'cantidad' => 'required|integer|min:1',
    ]);

    // Verificar que medicamento_id no sea nulo antes de guardar
    if (!$request->medicamento_id) {
        return redirect()->back()->with('error', 'Debe seleccionar un medicamento.');
    }

    $paciente = Paciente::create([
        'Nombre' => $request->Nombre,
        'cedula' => $request->cedula,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'categoria' => $request->categoria,
    ]);

    $jornada = Jornada::find($request->jornada_id);
    $jornada->pacientes()->attach($paciente->id, [
        'medicamento_id' => $request->medicamento_id, // ✅ Asegura que este valor no sea null
        'cantidad' => $request->cantidad
    ]);
    

    return redirect()->back()->with('success', 'Paciente registrado correctamente.');
}
}