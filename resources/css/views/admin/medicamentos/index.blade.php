@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Medicamentos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary">Agregar Medicamento</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Laboratorio</th>
                <th>Componente</th>
                <th>Existencia</th>
                <th>Tipo de Insumo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->Nombre }}</td>
                    <td>{{ $medicamento->Laboratorio }}</td>
                    <td>{{ $medicamento->Componente }}</td>
                    <td>{{ $medicamento->Existencia }}</td>
                    <td>{{ $medicamento->insumo->Tipo_Insumo }}</td> <!-- Suponiendo que tienes la relación definida -->
                    <td>
                        <a href="{{ route('medicamentos.show', $medicamento->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este medicamento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
