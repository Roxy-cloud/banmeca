@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <div class="card">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ $user->roles->pluck('name')->join(', ') }}</p>
            <p><strong>Avatar:</strong></p>
            <img src="{{ asset($user->avatar) }}" alt="Avatar del usuario" class="img-thumbnail" style="max-width: 150px;">
        </div>
    </div>
</div>
@endsection
