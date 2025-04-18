<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Categoria;
use App\Models\Benefactor;
use App\Models\Insumo;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamento::with(['categoria', 'insumo'])->get(); // Obtener todos los medicamentos con sus relaciones
        return view('admin.medicamentos.index', compact('medicamentos')); // Pasar a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        $benefactors = Benefactor::all(); // Obtener todos los benefactores para el formulario
        return view('admin.medicamentos.create', compact('categorias', 'insumos', 'benefactors')); // Mostrar formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'insumo_id' => 'required|exists:insumos,id',
            'benefactor_id' => 'required|exists:benefactors,id',
            'Nombre' => 'required|string|max:255',
            'Laboratorio' => 'required|string|max:255',
            'Componente' => 'required|string|max:255',
            'Existencia' => 'required|integer|min:1',
            'Fecha_Vencimiento' => 'required|date|after:today',
            'imagen' => 'file|image|nullable',
        ]);
    
        $medicamento = new Medicamento();
        $medicamento->categoria_id = $request->categoria_id;
        $medicamento->insumo_id = $request->insumo_id;
        $medicamento->benefactor_id = $request->benefactor_id;
        $medicamento->Nombre = $request->Nombre;
        $medicamento->Laboratorio = $request->Laboratorio;
        $medicamento->Componente = $request->Componente;
        $medicamento->Existencia = $request->Existencia;
        $medicamento->Fecha_Vencimiento = $request->Fecha_Vencimiento;
    
        // Asignar fecha de donación como fecha de creación
        $medicamento->Fecha_Donacion = now();
    
        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('assets/img/storage/medicamento', 'public');
            $medicamento->imagen = $path;
        } else {
            $medicamento->imagen = 'assets/img/storage/medicamento/medicina.png'; // Imagen por defecto
        }
    
        // Guardar el medicamento
        $medicamento->save();
    
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento agregado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        return view('admin.medicamentos.show', compact('medicamento')); // Mostrar detalles del medicamento
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicamento $medicamento)
    {
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario
        $insumos = Insumo::all(); // Obtener todos los insumos para el formulario
        $benefactors = Benefactor::all(); // Obtener todos los benefactores para el formulario
        return view('admin.medicamentos.edit', compact('medicamento', 'categorias', 'insumos','benefactors')); // Mostrar formulario de edición
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'benefactor_id' => 'required|exists:benefactors,id',
            'Nombre' => 'required|string|max:255',
            'Laboratorio' => 'required|string|max:255',
            'Componente' => 'required|string|max:255',
            'Existencia' => 'required|integer|min:1',
            'Fecha_Vencimiento' => 'required|date|after:today',
            'imagen' => 'file|image|nullable',
        ]);
    
        // Buscar el medicamento por su ID
        $medicamento = Medicamento::findOrFail($id);
    
        // Actualizar los datos básicos
        $medicamento->categoria_id = $request->categoria_id;
        $medicamento->benefactor_id = $request->benefactor_id;
        $medicamento->Nombre = $request->Nombre;
        $medicamento->Laboratorio = $request->Laboratorio;
        $medicamento->Componente = $request->Componente;
        $medicamento->Existencia = $request->Existencia;
        $medicamento->Fecha_Vencimiento = $request->Fecha_Vencimiento;
    
        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            // Guardar la nueva imagen en la carpeta de medicamentos
            
            $path = $request->file('imagen')->store('assets/img/storage/medicamento', 'public');
    
            // Asignar la nueva ruta al medicamento
            $medicamento->imagen = $path;
        }
    
        // Guardar los cambios
        $medicamento->save();
    
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento actualizado exitosamente.');
    }
    


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        

        return redirect()->route('admin.medicamentos.index')
                         ->with('success', 'Medicamento eliminado con éxito.');
    }
}
