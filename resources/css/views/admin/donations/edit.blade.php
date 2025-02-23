@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Donación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para editar la donación -->
    <form action="{{ route('donaciones.update', $donacion->id) }}" method="POST">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label for="benefactor_id" class="form-label">Benefactor</label>
            <select class="form-control" id="benefactor_id" name="benefactor_id" required>
                <option value="">Seleccionar Benefactor</option>
                @foreach ($benefactores as $benefactor)
                    <option value="{{ $benefactor->id }}" {{ $benefactor->id == $donacion->benefactor_id ? 'selected' : '' }}>
                        {{ $benefactor->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Fecha_Donacion" class="form-label">Fecha de Donación</label>
            <input type="datetime-local" class="form-control" id="Fecha_Donacion" name="Fecha_Donacion" 
                   value="{{ \Carbon\Carbon::parse($donacion->Fecha_Donacion)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion">{{ old('Descripcion', $donacion->Descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        <a href="{{ route('donaciones.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection
