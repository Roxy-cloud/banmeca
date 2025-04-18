<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
    <h1>Agregar Benefactor</h1>

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
<<<<<<< HEAD
            <label for="Rif_Cedula" class="form-label">Rif/Cédula</label>
            <input type="text" class="form-control" id="Rif_Cedula" name="Rif_Cedula" required>
=======
            <label for="RIF_Cedula" class="form-label">Rif/Cédula</label>
            <input type="text" class="form-control" id="RIF_Cedula" name="RIF_Cedula" required>
>>>>>>> e2a8b4e (Primer commit)
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
            <label for="CorreoElectronico" class="form-label">Correo Electrónico</label>
            <input type="text" class="form-control" id="CorreoElectronico" name="CorreoElectronico" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <a href="{{ route('benefactors.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
<<<<<<< HEAD
=======
    <a href="{{ route('insumos.create') }}" class="btn btn-secondary mt-3">Agregar Insumo</a>

>>>>>>> e2a8b4e (Primer commit)
</div>
@endsection
