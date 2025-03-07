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
        </form>
    </div>
@endsection
