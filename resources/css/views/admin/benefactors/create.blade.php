@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Beneficiario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('benefactors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="Tipo" name="Tipo" required>
        </div>
        <div class="mb-3">
            <label for="Rif_Cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control" id="Rif_Cedula" name="Rif_Cedula" required>
        </div>
        <div class="mb-3">
         <label for="Tipo" class="form-label">Tipo</label>
         <select class="form-control" id="Tipo" name="Tipo" required>
            <option value="">Seleccionar Tipo</option>
            <option value="Persona Natural">Persona Natural</option>
            <option value="Institución">Institución</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" required>
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" required>
        </div>

        <div class="mb-3">
            <label for="Informe_Medico" class="form-label">Informe Médico (opcional)</label>
            <input type="text" class="form-control" id="Informe_Medico" name="Informe_Medico">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <a href="{{ route('benefactors.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
@endsection
