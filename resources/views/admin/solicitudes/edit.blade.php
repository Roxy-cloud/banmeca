<<<<<<< HEAD
<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
</div>
=======
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Sede Regional</h1>
        <form action="{{ route('sede_regional.update', $sedeRegional->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="{{ $sedeRegional->Nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" name="Direccion" class="form-control" value="{{ $sedeRegional->Direccion }}" required>
            </div>
            <div class="mb-3">
                <label for="Responsable" class="form-label">Responsable</label>
                <input type="text" name="Responsable" class="form-control" value="{{ $sedeRegional->Responsable }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

>>>>>>> e2a8b4e (Primer commit)
