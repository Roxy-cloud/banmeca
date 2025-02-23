@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Beneficiario: {{ $beneficiario->Nombre }}</h1>

    <table class="table table-bordered mt-4">
        <tr>
            <th>Cédula</th>
            <td>{{ $beneficiario->Cedula }}</td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td>{{ $beneficiario->Fecha_Nacimiento }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $beneficiario->Direccion }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $beneficiario->Telefono }}</td>
        </tr>
        <tr>
            <th>Informe Médico</th>
            <td>{{ $beneficiario->Informe_Medico ?? 'No disponible' }}</td> <!-- Muestra "No disponible" si está vacío -->
        </tr>
    </table>

    <!-- Botones para editar o eliminar -->
    <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}" class="btn btn-warning">Editar</a>

    <!-- Formulario para eliminar -->
    <form action="{{ route('beneficiarios.destroy', $beneficiario->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este beneficiario?')">Eliminar</button>
    </form>

    <!-- Botón para volver a la lista -->
    <a href="{{ route('beneficiarios.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
@endsection

