<?php

namespace App\Http\Controllers;

use App\Models\Benefactor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BenefactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefactors = Benefactor::all();
        return response()->json($benefactors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'tipo' => 'required|in:Persona Natural,Institución',
            'rif_cedula' => 'required|unique:benefactors',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $benefactor = Benefactor::create($validator->validated());
        return response()->json($benefactor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Benefactor $benefactor)
    {
        return response()->json($benefactor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Benefactor $benefactor)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'tipo' => 'required|in:Persona Natural,Institución',
            'rif_cedula' => 'required|unique:benefactors,rif_cedula,' . $benefactor->id . ',id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $benefactor->update($validator->validated());
        return response()->json($benefactor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Benefactor $benefactor)
    {
        $benefactor->delete();
        return response()->json(null, 204);
    }
}
