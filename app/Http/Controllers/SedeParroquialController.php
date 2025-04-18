<?php

namespace App\Http\Controllers;

use App\Models\SedeParroquial;
use App\Models\SedeRegional;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class SedeParroquialController extends Controller
{
    public function index()
    {
        // Cargar las sedes parroquiales con la relación del responsable
        $sedeParroquiales = SedeParroquial::with('responsable')->get();
        return view('admin.sede_parroquial.index', compact('sedeParroquiales'));
    }
    

        private function obtenerResponsables()
        {
            $role = Role::where('name', 'responsable_parroquial')->first();
        
            return $role ? $role->users : collect();
        }
    
        public function create()
        {
            $role = Role::where('name', 'responsable_parroquial')->first(); // Definir el rol
            
                if (!$role) {
                    return redirect()->back()->with('error', 'El rol responsable parroquial no existe.');
                }
            $responsables = $role->users;
            $sedesRegionales = SedeRegional::all();
        
            return view('admin.sede_parroquial.create', compact('responsables', 'sedesRegionales'));
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'SedeRegional_id' => 'required|exists:sede_regional,id',
                'Nombre' => 'required|string|max:255',
                'Direccion' => 'required|string|max:255',
                'user_id' => 'required|exists:users,id',
                'telefono' => 'required|string|max:15', // Validar el campo teléfono

            ]);
        
            SedeParroquial::create($validatedData);
        
            return redirect()->route('sede_parroquial.index')->with('success', 'Sede parroquial creada exitosamente.');
        }
        
    

    public function edit($id)
    {
        $role = Role::where('name', 'responsable_parroquial')->first(); // Definir el rol
    
        if (!$role) {
            return redirect()->back()->with('error', 'El rol responsable parroquial no existe.');
        }
    
        $responsables = $role->users;
        $sedeParroquial = SedeParroquial::findOrFail($id);
        $sedesRegionales = SedeRegional::all();
    
        return view('admin.sede_parroquial.edit', compact('sedeParroquial', 'responsables', 'sedesRegionales'));
    }
    

    public function update(Request $request, $id)
{
    // Validación de datos
    $validatedData = $request->validate([
        'sedeRegional_id' => 'required|exists:sede_regional,id',
        'Nombre' => 'required|string|max:255',
        'Direccion' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id', // Campo relacionado con el usuario responsable
        'telefono' => 'required|string|max:15',
    ]);

    // Buscar el registro existente y actualizar los datos
    $sedeParroquial = SedeParroquial::findOrFail($id);
    $sedeParroquial->fill($validatedData); // Actualizar los datos del registro
    $sedeParroquial->user_id = $validatedData['user_id']; // Actualizar el responsable
    $sedeParroquial->save();

    // Redirigir con mensaje de éxito
    return redirect()->route('sede_parroquial.index')->with('success', 'Sede parroquial actualizada exitosamente.');
}

public function show(SedeParroquial $sedeParroquial)
{
    return view('admin.sede_parroquial.show', compact('sedeParroquial')); // Mostrar detalles de la sede parroquial
}

    public function destroy($id)
    {
        $sedeParroquial = SedeParroquial::findOrFail($id);
        $sedeParroquial->delete();

        return redirect()->route('sede_parroquial.index')->with('success', 'Sede parroquial eliminada exitosamente.');
    }
}
