<?php

namespace App\Http\Controllers;

use App\Models\Benefactor;

use App\Models\Equipment;
use App\Models\Medicamento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BenefactorController extends Controller
{
    // Mostrar todos los benefactores
    public function index()
    {
        $benefactors = Benefactor::with(['medicamentos', 'equipments'])->get();
        return view('admin.benefactors.index', compact('benefactors'));
    }
    

    // Mostrar el formulario para crear un nuevo benefactor
    public function create()
    {
        return view('admin.benefactors.create'); // Mostrar formulario de creación
    }
 
    // Almacenar un nuevo benefactor
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|in:Persona Natural,Institución',
            'RIF_Cedula' => 'required|string|unique:benefactors',
            'Direccion' => 'nullable|string|max:255',
            'Telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        Benefactor::create($validatedData);

        return redirect()->route('benefactors.index')->with('success', 'Benefactor registrado');
    }

    // Mostrar un benefactor específico
    public function show(Benefactor $benefactor)
{
    $medicamento = $benefactor->medicamento; // Carga las insumo del benefactor
    $equipment = $benefactor->equipment; // Carga las insumo del benefactor
    return view('admin.benefactors.show', compact('benefactor', 'medicamento','equipment')); // Pasa los datos a la vista
}





public function generarHistorial($benefactorId)
{
    $benefactor = Benefactor::with(['medicamentos', 'equipments'])->findOrFail($benefactorId);

    $pdf = PDF::loadView('pdf.historial_benefactor', compact('benefactor'))
        ->setPaper('letter', 'portrait'); // Configurar tamaño carta

    return $pdf->stream('HistorialBenefactor.pdf'); // Muestra el PDF en el navegador
}


    // Mostrar el formulario para editar un benefactor específico
    public function edit($id)
    {
        $benefactor = Benefactor::findOrFail($id);
        return view('admin.benefactors.edit', compact('benefactor'));
    }
    

    // Actualizar un benefactor específico
    public function update(Request $request, $id)
    {
        // Validación de los datos de entrada
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|in:Persona Natural,Institución',
            'RIF_Cedula' => 'required|string|unique:benefactors,RIF_Cedula,' . $id,
            'Direccion' => 'nullable|string|max:255',
            'Telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);
    
        // Encontrar el benefactor o lanzar un error 404
        $benefactor = Benefactor::findOrFail($id);
    
        // Responder con un mensaje de éxito y los datos actualizados
        $benefactor->update($request->all());

        return redirect()->route('benefactors.index')
                         ->with('success', 'benefactor actualizado con éxito.');
     
        
    }
    

    // Eliminar un benefactor específico
    public function destroy($id)
    {
        $benefactor = Benefactor::findOrFail($id);
        $benefactor->delete();
        return response()->json(['message' => 'Informacion borrada exitosamente']);
    }
}