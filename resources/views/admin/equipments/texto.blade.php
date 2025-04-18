@extends('layouts.app')

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

    <!-- Formulario para crear un Benefactor -->
    <form action="{{ route('benefactors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Rif_Cedula" class="form-label">Rif/Cédula</label>
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
            <label for="CorreoElectronico" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="CorreoElectronico" name="CorreoElectronico" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Benefactor</button>
    </form>

    <hr>

    <!-- Redirigir a agregar insumo después de registrar un benefactor -->
    <div class="mt-4">
        <h3>Agregar Insumo</h3>
        <form action="{{ route('insumos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="benefactor_id" class="form-label">Benefactor</label>
                <select class="form-control" id="benefactor_id" name="benefactor_id" required>
                    <option value="">Seleccione un Benefactor</option>
                    @foreach ($benefactors as $benefactor)
                        <option value="{{ $benefactor->id }}">{{ $benefactor->Nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="Tipo_Insumo" class="form-label">Tipo de Insumo</label>
                <select class="form-control" id="Tipo_Insumo" name="Tipo_Insumo" required>
                    <option value="">Seleccionar Tipo</option>
                    <option value="medicamento">Medicamento</option>
                    <option value="equipment">Equipo Médico</option>
                </select>
            </div>

            <!-- Campos específicos dinámicos según el tipo de insumo -->
            <div id="medicamento_fields" style="display: none;">
                <h5>Detalles del Medicamento</h5>
                <div class="mb-3">
                    <label for="NombreMedicamento" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="NombreMedicamento" name="NombreMedicamento">
                </div>
                <div class="mb-3">
                    <label for="Existencia" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="Existencia" name="Existencia">
                </div>
                <div class="mb-3">
                    <label for="Fecha_Vencimiento" class="form-label">Fecha de Vencimiento</label>
                    <input type="date" class="form-control" id="Fecha_Vencimiento" name="Fecha_Vencimiento">
                </div>
            </div>

            <div id="equipment_fields" style="display: none;">
                <h5>Detalles del Equipo Médico</h5>
                <div class="mb-3">
                    <label for="Marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="Marca" name="Marca">
                </div>
                <div class="mb-3">
                    <label for="Modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="Modelo" name="Modelo">
                </div>
                <div class="mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <select class="form-control" id="Estado" name="Estado">
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar Insumo</button>
        </form>
    </div>
</div>

<script>
    // Mostrar campos dinámicos según el tipo de insumo
    document.getElementById('Tipo_Insumo').addEventListener('change', function () {
        const tipo = this.value;
        document.getElementById('medicamento_fields').style.display = tipo === 'medicamento' ? 'block' : 'none';
        document.getElementById('equipment_fields').style.display = tipo === 'equipment' ? 'block' : 'none';
    });
</script>
@endsection
