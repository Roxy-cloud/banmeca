@extends('layouts.app')

@section('content')
    <h1>Lista de benefactores</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('benefactors.create') }}" class="btn btn-primary">Agregar benefactor</a>

    <table class="table">
    <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>RIF/Cédula</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($benefactors as $benefactor)
                <tr>
                    <td>{{ $benefactor->Nombre }}</td>
                    <td>{{ $benefactor->Tipo }}</td>
                    <td>{{ $benefactor->Rif_Cedula }}</td>
                    <td>{{ $benefactor->Direccion }}</td>
                    <td>{{ $benefactor->Telefono }}</td>
                    <td>{{ $benefactor->Correo_Electrónico }}</td>
                    <td>
                        <a href="{{ route('benefactors.show', $benefactor->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('benefactors.edit', $benefactor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('benefactors.destroy', $benefactor->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este benefactor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection