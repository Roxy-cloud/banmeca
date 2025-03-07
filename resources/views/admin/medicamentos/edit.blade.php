@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Editar Medicamento: {{ $equipment->Nombre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para editar el medicamento -->
    <form action="{{ route('equipments.update', $equipment->id) }}" method="POST">
        @csrf 
        @method('PUT')
              
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre Equipo Médico</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required />
        </div>

       
        <div class="mb-3">
            <label for="Laboratorio" class="form-label">Laboratorio</label>
            <input type="text" class="form-control" id="Laboratorio" name="Laboratorio" required />
        </div>

        <div class="mb-3">
            <label for="Componente" class="form-label">Componente</label>
            <input type="text" class="form-control" id="Componente" name="Componente" required />
        </div>

       
        <div class="mb-3">
            <label for="Existencia" class="form-label">Existencia</label>
            <input type="text" class="form-control" id="Existencia" name="Existencia" required />
        </div>

     <!-- Botones -->
        <button type="submit" class="btn btn-primary">Guardar Medicamento</button>

        <a href="{{ route('equipments.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection