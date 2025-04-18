<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Añadir Nuevo Equipo Médico</h1>
        <form action="{{ route('equipments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="insumo_id">Tipo de Insumo</label>
                <select name="insumo_id" id="insumo_id" class="form-control" required>
                    <option value="">Selecciona un insumo</option>
                    @foreach($insumos as $insumo)
                        <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nombre_del_equipo">Nombre del Equipo</label>
                <input type="text" name="nombre_del_equipo" id="nombre_del_equipo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir Equipo</button>
=======
@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Equipo Médico: {{ $equipment->Tipo }}</h1>
        <form action="{{ route('equipments.update', $equipment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Usamos PUT para la actualización -->
            
            <!-- Campo oculto para insumo_id -->
            <input type="hidden" name="insumo_id" value="2">

            <div class="form-group">
                <label for="nombre_del_equipo">Tipo</label>
                <input type="text" class="form-control" id="Tipo" name="Tipo" value="{{ old('Tipo', $equipment->Tipo) }}" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="Marca" name="Marca" value="{{ old('Marca', $equipment->Marca) }}" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="Modelo" name="Modelo" value="{{ old('Modelo', $equipment->Modelo) }}" required>
            </div>
            <div class="form-group">
                <label for="Existencia">Existencia</label>
                <input type="text" class="form-control" id="Existencia" name="Existencia" value="{{ old('Existencia', $equipment->Existencia) }}" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Bueno" {{ old('estado', $equipment->estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                    <option value="Regular" {{ old('estado', $equipment->estado) == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option value="Malo" {{ old('estado', $equipment->estado) == 'Malo' ? 'selected' : '' }}>Malo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                @if($equipment->imagen)
                    <img src="{{ asset('storage/' . $equipment->imagen) }}" alt="Imagen del Equipo Médico" class="img-thumbnail mt-2" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
>>>>>>> e2a8b4e (Primer commit)
        </form>
    </div>
@endsection
