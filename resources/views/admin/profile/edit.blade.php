@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Perfil</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" required>

            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar">
            <img src="{{ asset(auth()->user()->avatar) }}" width="100">

            @role('admin')
                <label for="role">Rol:</label>
                <select name="role">
                    <option value="admin" {{ auth()->user()->hasRole('admin') ? 'selected' : '' }}>Administrador</option>
                    <option value="responsable" {{ auth()->user()->hasRole('responsable') ? 'selected' : '' }}>Responsable</option>
                    <option value="benefactor" {{ auth()->user()->hasRole('benefactor') ? 'selected' : '' }}>Benefactor</option>
                </select>
            @endrole
            
            <button type="submit">Actualizar Perfil</button>
        </form>
    </div>
@endsection
