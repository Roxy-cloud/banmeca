<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Categoria;
use App\Models\Benefactor;
use App\Models\Insumo;
use App\Models\Componente;
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
    $request->merge(['componentes' => json_decode($request->componentes, true) ?? []]);

    $request->validate([
        'categoria_id' => 'required|exists:categorias,id',
        'insumo_id' => 'required|exists:insumos,id',
        'benefactor_id' => 'required|exists:benefactors,id',
        'Fecha_Donacion' => 'required|date',
        'Nombre' => 'required|string|max:255',
        'Laboratorio' => 'required|string|max:255',
        'presentacion' => 'required|string|max:255',
        'dosificacion' => 'required|string|max:255',
        'Existencia' => 'required|integer|min:1',
        'Fecha_Vencimiento' => 'required|date|after:today',
        'imagen' => 'file|image|nullable',
        'componentes' => 'required|array|min:1', // Asegurar que sea un array
        //'componentes.*' => 'exists:componentes,Nombre', // Validar que los nombres existan en la BD
    ]);

    $medicamento = Medicamento::create($request->except('componentes'));

    foreach ($request->componentes as $componenteNombre) {
        // Crea el componente si no existe y obtén su ID
        $componente = Componente::firstOrCreate(['Nombre' => $componenteNombre]);
    
        // Vincular el componente con el medicamento
        $medicamento->componentes()->attach($componente->id);
    }
    

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
    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $categorias = Categoria::all();
        $insumos = Insumo::all();
        $benefactors = Benefactor::all();
        $componentes = Componente::all(); // Cargar todos los componentes disponibles
    
        return view('admin.medicamentos.edit', compact('medicamento', 'categorias', 'insumos', 'benefactors', 'componentes'));
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
    $request->merge(['componentes' => json_decode($request->componentes, true) ?? []]);

    $request->validate([
        'categoria_id' => 'required|exists:categorias,id',
        'benefactor_id' => 'required|exists:benefactors,id',
        'Fecha_Donacion' => 'required|date',
        'Nombre' => 'required|string|max:255',
        'Laboratorio' => 'required|string|max:255',
        'dosificacion' => 'required|string|max:255',
        'presentacion' => 'required|string|max:255',
        'Existencia' => 'required|integer|min:1',
        'Fecha_Vencimiento' => 'required|date|after:today',
        'imagen' => 'file|image|nullable',
        'componentes' => 'required|array|min:1',
        'componentes.*' => 'exists:componentes,Nombre',
    ]);

    $medicamento = Medicamento::findOrFail($id);
    $medicamento->update($request->except('componentes'));

    // Actualizar los componentes
    $idsComponentes = [];
    foreach ($request->componentes as $componenteNombre) {
        $componente = Componente::firstOrCreate(['Nombre' => $componenteNombre]);
        $idsComponentes[] = $componente->id;
    }
    $medicamento->componentes()->sync($idsComponentes);

    return redirect()->route('medicamentos.index')->with('success', 'Medicamento actualizado exitosamente.');
}

public function generarReporte()
    {
        $medicamentos = Medicamento::with('benefactor')->orderBy('Fecha_Donacion', 'desc')->get();
       
    
        $pdf = Pdf::loadView('reportes.insumos', compact('medicamentos', 'equipments'));
    
        return $pdf->download('reporte_insumos.pdf');
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
