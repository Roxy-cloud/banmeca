@extends('admin.layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <h1>Registrar Beneficiario y Solicitud</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('beneficiarios.solicitudes.store') }}" method="POST">
        @csrf

        <!-- Datos del Beneficiario -->
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre del Beneficiario</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required />
        </div>

        <div class="mb-3">
            <label for="Cedula" class="form-label">Cédula del Beneficiario</label>
            <input type="text" class="form-control" id="Cedula" name="Cedula" required />
        </div>

        <!-- Tipo de Solicitud -->
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Solicitud</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="">Seleccionar Tipo</option>
                <option value="comodato">Comodato</option>
                <option value="donativo">Donativo</option>
            </select>
        </div>

        <!-- Tipo de Insumo -->
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría del Insumo</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="">Seleccionar Categoría</option>
                <option value="medicamentos">Medicamentos</option>
                <option value="equipos médicos">Equipos Médicos</option>
            </select>
        </div>
        <!-- Campos para medicamentos -->
<div id="medicamentos_fields" style="display: none;">
    <!-- Aquí van los campos específicos para medicamentos -->
    <div class="mb-3">
        <label for="medicamento_nombre">Nombre del Medicamento</label>
        <input type="text" class="form-control" id="medicamento_nombre" name="medicamento_nombre">
    </div>
    <!-- Agrega más campos si es necesario -->
</div>

<!-- Campos para equipos médicos -->
<div id="equipos_medicos_fields" style="display: none;">
    <!-- Aquí van los campos específicos para equipos médicos -->
    <div class="mb-3">
        <label for="equipo_medico_nombre">Nombre del Equipo Médico</label>
        <input type="text" class="form-control" id="equipo_medico_nombre" name="equipo_medico_nombre">
    </div>
</div>

        <!-- Descripción de la Solicitud (opcional) -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción de la Solicitud</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>

        <!-- Botones -->
        <button type="submit" class="btn btn-primary">Guardar</button>

        <a href="{{ route('beneficiarios.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection


<script>
   document.getElementById('insumo_tipo').addEventListener('change', function() {
    var insumoTipo = this.value;
    
    // Mostrar u ocultar campos según el tipo de insumo
    document.getElementById('medicamentos_fields').style.display = insumoTipo == 'medicamento' ? 'block' : 'none';
    document.getElementById('equipos_medicos_fields').style.display = insumoTipo == 'equipo_medico' ? 'block' : 'none';
});

</script>

=======

<form method="POST" action="{{ route('solicitudes.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="beneficiario_id" class="form-label">Beneficiario</label>
        <select class="form-control" id="beneficiario_id" name="beneficiario_id" required>
            <option value="">Seleccione un beneficiario</option>
            @foreach($beneficiarios as $beneficiario)
                <option value="{{ $beneficiario->id }}">{{ $beneficiario->Nombre }} ({{ $beneficiario->Cedula }})</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="categoria" class="form-label">Categoría</label>
        <select class="form-control" id="categoria" name="categoria" required>
            <option value="">Seleccione</option>
            <option value="medicamento">Medicamentos</option>
            <option value="equipments">Equipo médico</option>
        </select>
    </div>

    <div>
        <label for="categoria" class="form-label">Tipo de solicitud</label>
        <select class="form-control" id="categoria" name="categoria" required>
        <option value="">Seleccione el tipo</option>
            @if(old('categoria') == 'equipments')
                <option value="comodato">Comodato</option>
                <option value="donativo">Donativo</option>
            @else
                <option value="donativo">Donativo</option>
            @endif
        </select>
    </div>
   
    <div id="medicamento_field" style="display: none;">
        <label for="medicamento_id" class="form-label">Medicamento Solicitado</label>
        <select class="form-control" id="medicamento_id" name="medicamento">
            <option value="">Seleccione</option>
            @foreach($medicamentos as $medicamento)
                <option value="{{ $medicamento->id }}">{{ $medicamento->Nombre }} ({{ $medicamento->Laboratorio }})</option>
            @endforeach
        </select>
    </div>
    <div id="equipment_field" style="display: none;">
        <label for="equipment_id" class="form-label">Equipo Solicitado</label>
        <select class="form-control" id="equipment_id" name="equipmets">
            <option value="">Seleccione</option>
            @foreach($equipos as $equipment)
                <option value="{{ $equipment->id }}">{{ $equipment->Tipo }} ({{ $equipment->Marca }})</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Hacer solicitud</button>
    </div>
</form>

@endsection

@push('page-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoriaSelect = document.querySelector('select[name="categoria"]');
    const medicamentoField = document.getElementById('medicamento_field');
    const equipmentField = document.getElementById('equipment_field');
  

    categoriaSelect.addEventListener('change', function() {
        if (this.value === 'medicamentos') {
            medicamentoField.style.display = 'block';
            equipmentField.style.display = 'none';
        } else if (this.value === 'equipments') {
            medicamentoField.style.display = 'none';
            equipmentField.style.display = 'block';

        } else {
            medicamentoField.style.display = 'none';
            equipmentField.style.display = 'none';
        }
    });
});
</script>

@endpush

>>>>>>> e2a8b4e (Primer commit)
