<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Jornada;
use App\Models\SedeRegional;
use App\Models\SedeParroquial;
use App\Models\Paciente;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    public function index()
    {
        $jornadas = Jornada::all();
        return view('admin.jornadas.index', compact('jornadas'));
    }

   public function create()
{
    // Obtener la fecha actual en formato Y-m-d
    $fecha_formateada = Carbon::now()->format('Y-m-d'); 

    // Obtener datos necesarios para el formulario
    $sedeRegional = SedeRegional::all();
    $sedesParroquiales = SedeParroquial::all();
    $medicamentos = Medicamento::all();

    // Enviar los datos a la vista
    return view('admin.jornadas.create', compact('fecha_formateada', 'sedeRegional', 'sedesParroquiales', 'medicamentos'));
}


  public function store(Request $request)
{
    // Validación de datos
    $request->validate([
        'SedeRegional_id' => 'required|exists:sede_regional,id',
        'SedeParroquial_id' => 'required|exists:sede_parroquial,id',
        'diocesis' => 'required|string|max:255',
        'fecha' => 'required|date',
        'pacientes' => 'required|array',
        'pacientes.*.medicamento_id' => 'required|exists:medicamentos,id',
        'pacientes.*.cantidad' => 'required|integer|min:1'
    ]);

    // Convertir la fecha al formato correcto (Y-m-d) antes de guardarla en la base de datos
    $fecha = Carbon::createFromFormat('d-m-Y', $request->fecha)->format('Y-m-d');

    // Crear la jornada médica
    $jornada = Jornada::create([
        'SedeRegional_id' => $request->SedeRegional_id,
        'SedeParroquial_id' => $request->SedeParroquial_id,
        'diocesis' => $request->diocesis,
        'fecha' => $fecha, 
    ]);

    // Registrar pacientes sin duplicación
    foreach ($request->pacientes as $pacienteData) {
        $pacienteExistente = Paciente::where('cedula', $pacienteData['cedula'])->first();

        if ($pacienteExistente) {
            // Verificar si el paciente ya está en la jornada antes de asociarlo
            if (!$jornada->pacientes->contains($pacienteExistente->id)) {
                $jornada->pacientes()->attach($pacienteExistente->id, [
                    'medicamento_id' => $pacienteData['medicamento_id'],
                    'cantidad' => $pacienteData['cantidad']
                ]);
            }
        } else {
            // Crear y asociar un nuevo paciente
            $nuevoPaciente = Paciente::create([
                'Nombre' => $pacienteData['Nombre'],
                'cedula' => $pacienteData['cedula'],
                'edad' => $pacienteData['edad'],
                'sexo' => $pacienteData['sexo'],
                'categoria' => $pacienteData['categoria'],
            ]);

            $jornada->pacientes()->attach($nuevoPaciente->id, [
                'medicamento_id' => $pacienteData['medicamento_id'],
                'cantidad' => $pacienteData['cantidad']
            ]);
        }
    }

    return redirect()->route('jornadas.index')->with('success', 'Jornada médica registrada correctamente.');
}

    
public function report(Jornada $jornada)
{
    $fecha = $jornada->fecha; 
    $SedeRegional = $jornada->sedeRegional->Nombre;
    $SedeParroquial = $jornada->sedeParroquial->Nombre;
    $diocesis = $jornada->diocesis;
    $total_pacientes = $jornada->pacientes->count();
    $masculinos = $jornada->pacientes->where('sexo', 'M')->count();
    $femeninos = $jornada->pacientes->where('sexo', 'F')->count();

    // Medicinas entregadas
    $medicinas = $jornada->pacientes->map(function ($paciente) {
        return [
            'medicina_entregada' => $paciente->pivot->medicamento->Nombre ?? 'No registrado',
            'cantidad' => $paciente->pivot->cantidad ?? 0
        ];
    });

    return view('admin.jornadas.reporte', compact(
        'fecha', 'SedeRegional', 'SedeParroquial', 'diocesis',
        'total_pacientes', 'masculinos', 'femeninos', 'medicinas'
    ));
}

    


public function generatePDF(Jornada $jornada)
{
    // Obtener el total de pacientes por categoría
    $stats = $jornada->pacientes->groupBy('categoria')->map->count();

    // Agrupar medicamentos distribuidos y contar cuántas veces se entregó cada uno
    $medicamentosDistribuidos = $jornada->pacientes()
        ->with('medicamentos')
        ->get()
        ->groupBy('pivot.medicamento_id')
        ->map(function ($pacientes) {
            $medicamento = Medicamento::find($pacientes->first()->pivot->medicamento_id);
            
            return [
                'nombre' => $medicamento ? $medicamento->Nombre : 'No registrado',
                'cantidad' => $pacientes->sum('pivot.cantidad')
            ];
        });

    // Lista de pacientes atendidos
    $pacientesAtendidos = $jornada->pacientes()
        ->with('medicamentos')
        ->get()
        ->map(function ($paciente) {
            return [
                'nombre' => $paciente->Nombre,
                'edad' => $paciente->edad,
                'categoria' => $paciente->categoria,
                'sexo' => $paciente->sexo,
                'medicamento' => optional($paciente->medicamentos->first())->Nombre ?? 'No registrado',
                'cantidad' => $paciente->pivot->cantidad ?? 0
            ];
        });

    // Datos adicionales para el reporte
    $fecha = $jornada->fecha;
    $SedeRegional = $jornada->sedeRegional->Nombre;
    $SedeParroquial = $jornada->sedeParroquial->Nombre;
    $diocesis = $jornada->diocesis;
    $total_pacientes = $jornada->pacientes->count();
    $masculinos = $jornada->pacientes->where('sexo', 'M')->count();
    $femeninos = $jornada->pacientes->where('sexo', 'F')->count();

    // Generar el PDF con la vista
    $pdf = Pdf::loadView('admin.jornadas.reporte', compact(
        'fecha', 'SedeRegional', 'SedeParroquial', 'diocesis',
        'total_pacientes', 'masculinos', 'femeninos',
        'medicamentosDistribuidos', 'stats', 'pacientesAtendidos'
    ));

    return $pdf->download('reporte_jornada.pdf');
}



public function show(Jornada $jornada)
{
    // Obtener el total de pacientes por categoría
    $stats = $jornada->pacientes->groupBy('categoria')->map->count();

    // Agrupar medicamentos distribuidos y contar cuántas veces se entregó cada uno
    $medicamentosDistribuidos = $jornada->pacientes()
    ->with('medicamentos') // ✅ Cargar la relación de medicamentos
    ->get()
    ->groupBy('pivot.medicamento_id')
    ->map(function ($pacientes) {
        $medicamento = Medicamento::find($pacientes->first()->pivot->medicamento_id);
        
        return [
            'nombre' => $medicamento ? $medicamento->Nombre : 'No registrado',
            'cantidad' => $pacientes->sum('pivot.cantidad')
        ];
    });


    return view('admin.jornadas.show', compact('jornada', 'stats', 'medicamentosDistribuidos'));
}


}
