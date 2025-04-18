<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
    <h1>Lista de Benefactores</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('benefactors.create') }}" class="btn btn-primary">Agregar benefactor</a>

    <div class="card">
			<div class="card-body">
				<div class="table-responsive">
                <table id="solicitudes-table" class="datatable table table-hover table-center mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>RIF/Cédula</th>
                       
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>
<<<<<<< HEAD
             @foreach ($benefactor as $benefactor)
=======
             @foreach ($benefactors as $benefactor)
>>>>>>> e2a8b4e (Primer commit)
                <tr>
                    <td>{{ $benefactor->Nombre }}</td>
                    <td>{{ $benefactor->Tipo }}</td>
                    <td>{{ $benefactor->RIF_Cedula }}</td>
                  
                    <td>
                        <a href="{{ route('benefactors.show', $benefactor->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('benefactors.edit', $benefactor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('benefactors.destroy', $benefactor->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
<<<<<<< HEAD
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este benefactor?')">Eliminar</button>
=======
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este Registro?')">Eliminar</button>
>>>>>>> e2a8b4e (Primer commit)
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