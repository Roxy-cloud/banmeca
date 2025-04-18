<<<<<<< HEAD
<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>
=======
@extends('admin.layouts.app')

@section('content')
<h1>Crear Usuario</h1>
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"> <!-- Agregado enctype -->
    @csrf

    <label for="name">Nombre:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation" required>

    <label for="role">Rol:</label>
    <select name="role" required>
        <option value="" disabled selected>Seleccionar Rol</option>
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>

    <label for="avatar">Foto de Perfil:</label>
    <input type="file" name="avatar" accept="image/*"> <!-- Campo para subir imagen -->

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</form>
@endsection
>>>>>>> e2a8b4e (Primer commit)
