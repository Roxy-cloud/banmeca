@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Solicitudes</h1>
        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Crear Nueva Solicitud</a>
        <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="insumos-table" class="datatable table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Beneficiario</th>
                    <th>Medicamento Solicitado</th>
                    <th>Fecha de Solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->beneficiario->nombre }}</td>
                        <td>{{ $solicitud->medicamento->nombre }}</td>
                        <td>{{ $solicitud->fecha_solicitud }}</td>
                        <td>
                            <a href="{{ route('solicitudes.show', $solicitud) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" style="display:inline;">
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
