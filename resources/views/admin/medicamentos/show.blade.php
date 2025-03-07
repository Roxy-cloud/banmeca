@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Medicamento: {{ $medicamento->Nombre }}</h1>

    <table class="table table-bordered mt-4">
        <tr>
            <th>Categoría</th>
            <td>{{ $medicamento->categoria->Nombre }}</td> 
        </tr>
        
        <tr>
            <th>Laboratorio</th>
            <td>{{ $medicamento->Laboratorio }}</td>
        </tr>
        <tr>
            <th>Componente</th>
            <td>{{ $medicamento->Componente }}</td>
        </tr>
        <tr>
            <th>Existencia</th>
            <td>{{ $medicamento->Existencia }}</td> 
        </tr>

        
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

    </table>

</div>

@endsection

