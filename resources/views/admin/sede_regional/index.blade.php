@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Sedes Regional</h1>

        {{-- Ocultar el botón si ya existe al menos una sede --}}
        @if($sedeRegional->count() == 0)
            <a href="{{ route('sede_regional.create') }}" class="btn btn-primary mb-3">Agregar Nueva Sede Regional</a>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sedeRegional as $sede)
                    <tr>
                        <td>{{ $sede->Nombre }}</td>
                        <td>{{ $sede->Direccion }}</td>
                        <td>{{ $sede->Responsable }}</td>
                        <td>
                            <a href="{{ route('sede_regional.show', $sede->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('sede_regional.edit', $sede->id) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
