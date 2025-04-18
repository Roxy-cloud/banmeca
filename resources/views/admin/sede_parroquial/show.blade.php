<<<<<<< HEAD
<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div>
=======
<!-- resources/views/sede_parroquial/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Sede Parroquial</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $sedeParroquial->Nombre }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Dirección:</strong> {{ $sedeParroquial->Direccion }}</p>
                <p><strong>Responsable:</strong> {{ $sedeParroquial->responsable->name }}</p>
                <a href="{{ route('sede_parroquial.index') }}" class="btn btn-secondary">Volver al Listado</a>
                <a href="{{ route('sede_parroquial.edit', $sedeParroquial->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('sede_parroquial.destroy', $sedeParroquial->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

>>>>>>> e2a8b4e (Primer commit)
