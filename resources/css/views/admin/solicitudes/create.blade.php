<!-- resources/views/insumos/create.blade.php -->
<form action="{{ route('insumos.store') }}" method="POST">
    @csrf
    <div>
        <label for="tipo">Tipo de solicitud:</label>
        <select name="tipo" id="tipo">
            <option value="donativo">Donativo</option>
            <option value="comodato">Comodato</option>
        </select>
    </div>
    <div>
        <label for="beneficiario_id">Beneficiario:</label>
        <select name="beneficiario_id" id="beneficiario_id">
            @foreach($beneficiarios as $beneficiario)
                <option value="{{ $beneficiario->id }}">{{ $beneficiario->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="responsable_id">Responsable:</label>
        <select name="responsable_id" id="responsable_id">
            @foreach($responsables as $responsable)
                <option value="{{ $responsable->id }}">{{ $responsable->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="insumo_tipo">Tipo de insumo:</label>
        <select name="insumo_tipo" id="insumo_tipo">
            <option value="medicamento">Medicamento</option>
            <option value="equipo_medico">Equipo Médico</option>
        </select>
    </div>
    <div id="medicamentos_fields" style="display: none;">
        <label for="medicamento_nombre">Nombre del medicamento:</label>
        <input type="text" name="medicamento_nombre" id="medicamento_nombre">
        <label for="medicamento_dosis">Dosis del medicamento:</label>
        <input type="text" name="medicamento_dosis" id="medicamento_dosis">
    </div>
    <div id="equipos_medicos_fields" style="display: none;">
        <label for="equipo_medico_nombre">Nombre del equipo médico:</label>
        <input type="text" name="equipo_medico_nombre" id="equipo_medico_nombre">
        <label for="equipo_medico_descripcion">Descripción del equipo médico:</label>
        <input type="text" name="equipo_medico_descripcion" id="equipo_medico_descripcion">
    </div>
    <button type="submit">Enviar solicitud</button>
</form>

<script>
    document.getElementById('insumo_tipo').addEventListener('change', function() {
        var insumoTipo = this.value;
        document.getElementById('medicamentos_fields').style.display = insumoTipo == 'medicamento' ? 'block' : 'none';
        document.getElementById('equipos_medicos_fields').style.display = insumoTipo == 'equipo_medico' ? 'block' : 'none';
    });
</script>

