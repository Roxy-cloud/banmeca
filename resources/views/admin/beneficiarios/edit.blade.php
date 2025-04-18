<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
    <h1>Editar Beneficiario: {{ $beneficiario->Nombre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para editar el beneficiario -->
    <form action="{{ route('beneficiarios.update', $beneficiario->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Campos del formulario -->
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $beneficiario->Nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="Cedula" class="form-label">Cédula</label>
            <!-- La cédula no debe ser editable, así que la mostramos como texto -->
            <input type="text" class="form-control" id="Cedula" name="Cedula" value="{{ old('Cedula', $beneficiario->Cedula) }}" readonly required> 
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mb-3">
            <label for "Fecha_Nacimiento">Fecha de Nacimiento</label> 
            <!-- Campo editable -->
            <input type "date" class "form-control"
                   id "Fecha_Nacimiento"
                   name "Fecha_Nacimiento"
                   value "{{ old('Fecha_Nacimiento', $beneficiario->Fecha_Nacimiento) }}"
                   required> 
         </div>
        <div>
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion"  value "{{ old('Direccion', $beneficiario->Direccion) }}"required>
        </div>
        <div>
            <label for="Direccion" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono"  value "{{ old('Telefono', $beneficiario->Telefono) }}"required>
        </div>
        <div>
        <label for="Informe_Medico" class="form-label">Informe Médico (opcional)</label>
        <input type="text" class="form-control" id="Informe_Medico" name="Informe_Medico">
        </div>
         ...
         <button type="submit" class="btn btn-primary">Guardar Beneficiario</button>
    <a href="{{ route('beneficiarios.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
         ...
     </form>

           
     <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning">Editar</a>

<!-- Formulario para eliminar -->
<form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"
            onclick="return confirm('¿Estás seguro de eliminar este medicamento?')">Eliminar</button>
</form>

<!-- Botón para volver a la lista -->
<a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>


</div>

@endsection
