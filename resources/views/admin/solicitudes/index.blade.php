<<<<<<< HEAD
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
=======
@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Beneficiarios y Solicitudes</h1>

        <h2>Beneficiarios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <!-- ...  ... -->
                </tr>
            </thead>
            <tbody>
                @foreach ($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $beneficiario->Nombre }}</td>
                        <td>{{ $beneficiario->Cedula }}</td>
                        <!-- ... otras celdas ... -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Solicitudes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Beneficiario</th>
                    <th>Tipo</th>

>>>>>>> e2a8b4e (Primer commit)
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr>
<<<<<<< HEAD
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
=======
                        <td>{{ $solicitud->beneficiario->Nombre }}</td>
                        <td>{{ $solicitud->tipo }}</td>

                        <!-- ... otras celdas ... -->
>>>>>>> e2a8b4e (Primer commit)
                    </tr>
                @endforeach
            </tbody>
        </table>
<<<<<<< HEAD
        </div>
        </div>
=======

        <a href="{{ route('beneficiarios_solicitudes.create') }}" class="btn btn-primary">Crear Nuevo Beneficiario y Solicitud</a>
>>>>>>> e2a8b4e (Primer commit)
    </div>
@endsection
