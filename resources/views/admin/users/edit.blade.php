<<<<<<< HEAD
<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
</div>
=======
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Editar Perfil del Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul> 
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"> <!-- Agregado enctype -->
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="password">Nueva Contraseña (opcional):</label>
            <input type="password" name="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirmar Nueva Contraseña:</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="mb-3">
            <!-- Solo el admin puede ver esto -->
            @role('admin')
                <label for="role">Rol:</label>
                <select name="role">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            @endrole
        </div>

        <!-- Foto de perfil -->
        <div class="mb-3">
            <label for="avatar">Foto de Perfil:</label>
            <input type="file" name="avatar" accept="image/*"> <!-- Campo para subir imagen -->

            <!-- Mostrar vista previa del avatar actual -->
            @if($user->avatar)
                <div class="mt-2">
                    <img src="{{ asset($user->avatar) }}" alt="Avatar" width="150" class="rounded">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
