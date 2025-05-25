<?php

// App\Http\Controllers\SedeRegionalController.php
namespace App\Http\Controllers;

use App\Models\SedeRegional;
use Illuminate\Http\Request;

class SedeRegionalController extends Controller
{
    public function index()
    {
        
        $sedeRegional = SedeRegional::all();
        return view('admin.sede_regional.index', compact('sedeRegional'));
    }

    public function create()
    {
        return view('admin.sede_regional.create');
    }

    public function store(Request $request)
    {
        SedeRegional::create($request->all());
        return redirect()->route('sede_regional.index');
    }

    public function show(SedeRegional $sedeRegional)
    {

        return view('admin.sede_regional.show', compact('sedeRegional'));
    }

    public function edit($id)
    {
        $sedeRegional = SedeRegional::findOrFail($id);
        return view('admin.sede_regional.edit', compact('sedeRegional'));
    }

    public function update(Request $request, $id)
    {
        $sedeRegional = SedeRegional::findOrFail($id);
        $sedeRegional->update($request->all());
        return redirect()->route('sede_regional.index');
    }

    public function destroy($id)
    {
        $sedeRegional = SedeRegional::findOrFail($id);
        $sedeRegional->delete();
        return redirect()->route('sede_regional.index');
    }
}