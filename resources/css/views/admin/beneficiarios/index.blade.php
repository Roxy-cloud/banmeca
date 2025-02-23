@extends('layouts.app')

@section('content')
    <h1>Lista de Beneficiarios</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('beneficiarios.create') }}" class="btn btn-primary">Agregar Beneficiario</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Fecha de Nacimiento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiarios as $beneficiario)
                <tr>
                    <td>{{ $beneficiario->Nombre }}</td>
                    <td>{{ $beneficiario->Cedula }}</td>
                    <td>{{ $beneficiario->Fecha_Nacimiento }}</td>
                    <td>{{ $beneficiario->Direccion }}</td>
                    <td>{{ $beneficiario->Telefono }}</td>
                    <td>
                        <a href="{{ route('beneficiarios.show', $beneficiario->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('beneficiarios.destroy', $beneficiario->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este beneficiario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
