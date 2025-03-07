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

    <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="insumos-table" class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha-Vencimiento</th>
                            <th>Existencia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicamentos as $medicamento)
                            <tr>
                                <td>{{ $medicamento->Nombre }}</td>
                                <td>{{ $medicamento->Fecha_Vencimiento }}</td>
                                <td>{{ $medicamento->Existencia }}</td>
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
</div>
</div>
@endsection
