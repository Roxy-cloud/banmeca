<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
    <div class="container">
        <h1>Añadir Nuevo Equipo Médico</h1>
<<<<<<< HEAD
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
=======
        <form action="{{ route('equipments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para insumo_id -->
            <input type="hidden" name="insumo_id" value="2">
            
            <!-- Benefactor ID -->
            <div class="form-group">

                    <label for="benefactor_id" class="form-label">Agregar un Benefactor</label>
                    <select class="form-control" id="benefactor_id" name="benefactor_id" required>
                        <option value="">Seleccionar</option>
                        @foreach ($benefactors as $benefactor)
                            <option value="{{ $benefactor->id }}">{{ $benefactor->Nombre }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group">
                <label for="Tipo">Tipo</label>
                <input type="text" name="Tipo" id="Tipo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Marca">Marca</label>
                <input type="text" name="Marca" id="Marca" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="Modelo">Modelo</label>
                <input type="text" name="Modelo" id="Modelo" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="Existencia">Existencia</label>
                <input type="text" name="Existencia" id="Existencia" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Estado">Estado</label>
                <select name="Estado" id="Estado" class="form-control" required>
>>>>>>> e2a8b4e (Primer commit)
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
<<<<<<< HEAD
=======
            
            <div class="form-group">
                <label for="Fecha_Donacion">Fecha de Donación</label>
                <input type="date" name="Fecha_Donacion" id="Fecha_Donacion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen del Equipo Médico</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            
>>>>>>> e2a8b4e (Primer commit)
            <button type="submit" class="btn btn-primary">Añadir Equipo</button>
        </form>
    </div>
@endsection
