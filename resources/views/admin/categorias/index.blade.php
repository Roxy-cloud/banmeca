<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
    <h1>Lista de Categorías</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar Categoría</a>
<<<<<<< HEAD

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->Nombre }}</td>
                    <td>{{ $categoria->Descripcion }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
=======
    <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="categorias-table" class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>DESCRIPCIÓN</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->Nombre }}</td>
                                    <td>{{ $categoria->Descripcion }}</td>
                                    <td>
                                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Ver</a>
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
>>>>>>> e2a8b4e (Primer commit)
</div>
@endsection

