<<<<<<< HEAD
<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
=======
@extends('admin.layouts.app')

@section('content')
<h1>Lista de Usuarios</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este Usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
>>>>>>> e2a8b4e (Primer commit)
