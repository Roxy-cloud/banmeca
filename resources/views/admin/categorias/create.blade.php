<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('admin.layouts.app')
>>>>>>> e2a8b4e (Primer commit)

@section('content')
<div class="container">
    <h1>Agregar Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection
