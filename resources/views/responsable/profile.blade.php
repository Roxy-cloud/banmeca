@extends('responsable.layouts.app')

@section('content')
<h1>Editar Perfil</h1>
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>

    <label for="password">Nueva Contraseña (opcional):</label>
    <input type="password" name="password">

    <label for="password_confirmation">Confirmar Nueva Contraseña:</label>
    <input type="password" name="password_confirmation">

    <label for="avatar">Foto de Perfil:</label>
    <input type="file" name="avatar" accept="image/*">

    @if($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="150">
    @endif

    <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
</form>
@endsection
