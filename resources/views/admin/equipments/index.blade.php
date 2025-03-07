@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Equipos Médicos</h1>
        <a href="{{ route('equipments.create') }}" class="btn btn-primary">Crear Nuevo Equipo Médico</a>
        <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="insumos-table" class="datatable table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Existencia</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $equipment)
                    <tr>
                        <td><img src="{{ asset('storage/'.$equipment->imagen) }}" alt="" width="50" height="50"></td>
                        <td>{{ $equipment->Tipo }}</td>
                        <td>{{ $equipment->Marca }}</td>
                        <td>{{ $equipment->Modelo }}</td>
                        <td align='center'>{{ $equipment->Existencia }}</td>
                        <td>{{ $equipment->Estado }}</td>
                        <td>
                            <a href="{{ route('equipments.show', $equipment) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('equipments.edit', $equipment) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('equipments.destroy', $equipment) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
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
