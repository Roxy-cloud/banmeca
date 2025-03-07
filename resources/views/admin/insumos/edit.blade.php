@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Insumo: {{ $insumo->Nombre_Insumo }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para editar el insumo -->
    <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label for="insumo_id" class="form-label">Donación Asociada</label>
            <select class="form-control" id="insumo_id" name="insumo_id" required>
                <option value="">Seleccionar Donación</option>
                @foreach ($insumo as $Insumo)
                    <option value="{{ $Insumo->id }}" {{ $Insumo->id == $insumo->insumo_id ? 'selected' : '' }}>
                        {{ $Insumo->Fecha_Insumo }} <!-- Suponiendo que tienes un campo Fecha_Insumo en Donación -->
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Nombre_Insumo" class="form-label">Nombre del Insumo</label>
            <input type="text" class="form-control" id="Nombre_Insumo" name="Nombre_Insumo" 
                   value="{{ old('Nombre_Insumo', $insumo->Nombre_Insumo) }}" required>
        </div>

        <div class="mb-3">
            <label for="Tipo_Insumo" class="form-label">Tipo de Insumo</label>
            <select class="form-control" id="Tipo_Insumo" name="Tipo_Insumo" required>
                <option value="">Seleccionar Tipo de Insumo</option>
                <option value="Medicamento" {{ $insumo->Tipo_Insumo == 'Medicamento' ? 'selected' : '' }}>Medicamento</option>
                <option value="Equipo Médico" {{ $insumo->Tipo_Insumo == 'Equipo Médico' ? 'selected' : '' }}>Equipo Médico</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        <a href="{{ route('insumos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection
