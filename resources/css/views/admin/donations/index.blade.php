@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Donaciones</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('donaciones.create') }}" class="btn btn-primary">Agregar Donación</a>

    <table class="table">
        <thead>
            <tr>
                <th>Benefactor</th>
                <th>Fecha de Donación</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donaciones as $donacion)
                <tr>
                    <td>{{ $donacion->benefactor->Nombre }}</td> <!-- Suponiendo que tienes un campo Nombre en Benefactor -->
                    <td>{{ $donacion->Fecha_Donacion }}</td>
                    <td>{{ $donacion->Descripcion }}</td>
                    <td>
                        <a href="{{ route('donaciones.show', $donacion->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('donaciones.edit', $donacion->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('donaciones.destroy', $donacion->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta donación?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

