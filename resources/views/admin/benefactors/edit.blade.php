<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar benefactor: {{ $benefactor->Nombre }}</h1>
=======
@extends('admin.layouts.app')

@section('content')
    <h1>Actualizar Datos del Benefactor</h1>
>>>>>>> e2a8b4e (Primer commit)

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<<<<<<< HEAD
    <!-- Formulario para editar el benefactor -->
    <form action="{{ route('benefactors.update', $benefactor->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Campos del formulario -->
=======
    <form action="{{ route('benefactors.update', $benefactor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
>>>>>>> e2a8b4e (Primer commit)
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $benefactor->Nombre) }}" required>
        </div>

<<<<<<< HEAD
        <div class="mb-3">
            <label for="Rif_Cedula" class="form-label">Cédula</label>
            <!-- La cédula no debe ser editable, así que la mostramos como texto -->
            <input type="text" class="form-control" id="Rif_Cedula" name="Rif_Cedula" value="{{ old('Rif_Cedula', $benefactor->Rif_Cedula) }}" readonly required> 
        </div>
        <select class="form-control" id='Tipo' name='Tipo' required>
        <option value="">Seleccionar Tipo</option>

            <option {{ old('Tipo', $benefactor->.Tipo) == 'Persona Natural' ? 'selected' : '' }} 

                value='Persona Natural'>Persona Natural

            <option {{ old('Tipo', $benefactor->_tipo) == 'Institución' ? 'selected' : '' }} 

                value='Institución'> Institucion

        </select>
        <div>
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion"  value "{{ old('Direccion', $benefactor->Direccion) }}"required>
        </div>
        <div>
            <label for="Direccion" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono"  value "{{ old('Telefono', $benefactor->Telefono) }}"required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('benefactors.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
        </div>

     </form>
@endsection

=======
        <!-- RIF / Cédula -->
        <div class="mb-3">
            <label for="Rif_Cedula" class="form-label">Rif/Cédula</label>
            <input type="text" class="form-control" id="Rif_Cedula" name="Rif_Cedula" value="{{ old('Rif_Cedula', $benefactor->RIF_Cedula) }}" required>
        </div>

        <!-- Tipo -->
        <div class="mb-3">
            <label for="Tipo" class="form-label">Tipo</label>
            <select class="form-control" id="Tipo" name="Tipo" required>
                <option value="">Seleccionar Tipo</option>
                <option value="Persona Natural" {{ old('Tipo', $benefactor->Tipo) == 'Persona Natural' ? 'selected' : '' }}>Persona Natural</option>
                <option value="Institución" {{ old('Tipo', $benefactor->Tipo) == 'Institución' ? 'selected' : '' }}>Institución</option>
            </select>
        </div>

        <!-- Dirección -->
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" value="{{ old('Direccion', $benefactor->Direccion) }}" required>
        </div>

        <!-- Teléfono -->
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ old('Telefono', $benefactor->Telefono) }}" required>
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-3">
            <label for="CorreoElectronico" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico" value="{{ old('CorreoElectronico', $benefactor->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <a href="{{ route('benefactors.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
