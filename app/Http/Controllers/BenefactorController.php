<?php

namespace App\Http\Controllers;

use App\Models\Benefactor;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Benefactor;
use Illuminate\Http\Request;

class BenefactorController extends Controller
{
    // Mostrar todos los benefactores
    public function index()
    {
        $benefactors = Benefactor::all();
        return response()->json($benefactors);
    }

    // Mostrar el formulario para crear un nuevo benefactor
    public function create()
    {
        // Aquí puedes retornar una vista de formulario para crear un nuevo benefactor.
        return response()->json(['message' => 'Información del Benefactor']);
    }

    // Almacenar un nuevo benefactor
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|in:Persona Natural,Institución',
            'RIF_Cedula' => 'required|string|unique:benefactors',
            'Direccion' => 'nullable|string|max:255',
            'Telefono' => 'nullable|string|max:15',
            'Correo_Electronico' => 'nullable|email|max:255',
        ]);

        $benefactor = Benefactor::create($request->all());
        return response()->json($benefactor, 201);
    }

    // Mostrar un benefactor específico
    public function show(Benefactor $benefactor)
{
    $donaciones = $benefactor->donacions; // Carga las donaciones del benefactor
    
    return view('benefactors.show', compact('benefactor', 'donaciones')); // Pasa los datos a la vista
}

    // Mostrar el formulario para editar un benefactor específico
    public function edit($id)
    {
        $benefactor = Benefactor::findOrFail($id);
        return response()->json($benefactor);
    }

    // Actualizar un benefactor específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Tipo' => 'required|in:Persona Natural,Institución',
            'RIF_Cedula' => 'required|string|unique:benefactors,RIF_Cedula,' . $id,
            'Direccion' => 'nullable|string|max:255',
            'Telefono' => 'nullable|string|max:15',
            'Correo_Electronico' => 'nullable|email|max:255',
        ]);

        $benefactor = Benefactor::findOrFail($id);
        $benefactor->update($request->all());
        return response()->json($benefactor);
    }

    // Eliminar un benefactor específico
    public function destroy($id)
    {
        $benefactor = Benefactor::findOrFail($id);
        $benefactor->delete();
        return response()->json(['message' => 'Informacion borrada exitosamente']);
    }
}
