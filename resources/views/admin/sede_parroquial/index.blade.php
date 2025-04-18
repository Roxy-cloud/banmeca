<<<<<<< HEAD
<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>
=======
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Sedes Parroquiales</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('sede_parroquial.create') }}" class="btn btn-primary">Agregar Sede Parroquial</a>

    <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="sedes_parroquiales-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Responsable</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sedeParroquiales as $sede)
                            <tr>
                                <td>{{ $sede->Nombre }}</td>
                                <td>{{ $sede->Direccion }}</td>
                                <td>{{ $sede->responsable->name ?? 'Sin responsable' }}</td> <!-- Mostrar el nombre del responsable -->
                                <td>{{ $sede->telefono }}</td>
                                <td>
                                    <a href="{{ route('sede_parroquial.show', $sede->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('sede_parroquial.edit', $sede->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('sede_parroquial.destroy', $sede->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta Sede?')">Eliminar</button>
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
>>>>>>> e2a8b4e (Primer commit)
