<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Benefactor;
use App\Models\Insumo;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::with('insumo')->get(); // Obtener todos los equipments con sus relaciones
        return view('admin.equipments.index', compact('equipments')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        $benefactors = Benefactor::all(); // Obtener todos los benefactores para el formulario
        return view('admin.equipments.create', compact('insumos', 'benefactors')); // Correcto

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'benefactor_id' => 'required|exists:benefactors,id',
            'Tipo' => 'required|string',
            'Marca' => 'required|string',
            'Modelo' => 'required|string',
            'Existencia' => 'required|string',
            'Estado' => 'required|in:Bueno,Regular,Malo',
        ]);
     
        // Registro del equipo
        $equipo = new Equipment();
        $equipo->insumo_id = $request->insumo_id;
        $equipo->benefactor_id = $request->benefactor_id;
        $equipo->Fecha_Donacion = $request->Fecha_Donacion;
        $equipo->Tipo = $request->Tipo;
        $equipo->Marca = $request->Marca;
        $equipo->Modelo = $request->Modelo;
        $equipo->Existencia = $request->Existencia;
        $equipo->Estado = $request->Estado;
    
        // Configurar imagen predeterminada si no se proporciona una
        $equipo->imagen = $request->imagen ?? asset('assets/img/storage/equipment/equipment.jpg'); // Usar `asset` para mayor flexibilidad.
    
        $equipo->save();
    
        return redirect()->route('equipments.index')->with('success', 'Equipo agregado exitosamente.');

    }
 
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('admin.equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
       $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        $benefactors = Benefactor::all(); // Obtener todos los benefactores para el formulario
        return view('admin.equipments.edit', compact('equipment', 'insumos', 'benefactors')); // Pasar los insumos a la vista
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Buscar el equipo por su ID
    $equipo = Equipment::findOrFail($id);
 
    // Validar los datos proporcionados por el usuario
    $request->validate([
        'benefactor_id' => 'required|exists:benefactors,id',
        'Tipo' => 'string|nullable',
        'Marca' => 'string|nullable',
        'Modelo' => 'string|nullable',
        'Existencia' => 'string|nullable',
        'Estado' => 'in:Bueno,Regular,Malo|nullable',
        'imagen' => 'file|image|nullable', // Validar que sea una imagen si se proporciona
    ]);

    // Actualizar los campos proporcionados

    $equipo->insumo_id = $request->insumo_id;
    $equipo->benefactor_id = $request->benefactor_id;
    $equipo->Fecha_Donacion = $request->Fecha_Donacion;
    $equipo->Tipo = $request->Tipo ?? $equipo->Tipo;
    $equipo->Marca = $request->Marca ?? $equipo->Marca;
    $equipo->Modelo = $request->Modelo ?? $equipo->Modelo;
    $equipo->Existencia = $request->Existencia ?? $equipo->Existencia;
    $equipo->Estado = $request->Estado ?? $equipo->Estado;

    // Manejar la actualización de la imagen
    if ($request->hasFile('imagen')) {
        // Ruta donde guardarás las imágenes (ajústala según tu estructura de almacenamiento)
        $path = $request->file('imagen')->store('assets/img/storage/equipment');

        // Actualizar la imagen del equipo con la nueva ruta
        $equipo->imagen = $path;
    }

    // Guardar los cambios en la base de datos
    $equipo->save();

    return redirect()->route('equipments.index')->with('success', 'Equipo actualizado exitosamente.');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipments.index')
                         ->with('success', 'Equipo Medico eliminado con éxito.');
    }
}
