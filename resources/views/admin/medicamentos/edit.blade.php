@extends('admin.layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <h1>Editar Medicamento: {{ $equipment->Nombre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
=======
    <h1>Editar Medicamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul> 
>>>>>>> e2a8b4e (Primer commit)
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<<<<<<< HEAD
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
=======
    <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="benefactor_id" class="form-label">Benefactor</label>
            <select class="form-control" id="benefactor_id" name="benefactor_id" required>
                @foreach ($benefactors as $benefactor)
                    <option value="{{ $benefactor->id }}" {{ $medicamento->benefactor_id == $benefactor->id ? 'selected' : '' }}>
                        {{ $benefactor->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $medicamento->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre del Medicamento</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $medicamento->Nombre }}" required />
        </div>

        <div class="mb-3">
            <label for="Laboratorio" class="form-label">Laboratorio</label>
            <input type="text" class="form-control" id="Laboratorio" name="Laboratorio" value="{{ $medicamento->Laboratorio }}" required />
>>>>>>> e2a8b4e (Primer commit)
        </div>

        <div class="mb-3">
            <label for="Componente" class="form-label">Componente</label>
<<<<<<< HEAD
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
=======
            <input type="text" class="form-control" id="Componente" name="Componente" value="{{ $medicamento->Componente }}" required />
        </div>

        <div class="mb-3">
            <label for="Existencia" class="form-label">Existencia</label>
            <input type="number" class="form-control" id="Existencia" name="Existencia" value="{{ $medicamento->Existencia }}" required />
        </div>

        <div class="mb-3">
            <label for="Fecha_Vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="Fecha_Vencimiento" name="Fecha_Vencimiento" value="{{ $medicamento->Fecha_Vencimiento }}" required />
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" />
            <small>Imagen actual: <img src="{{ asset('storage/' . $medicamento->imagen) }}" width="100"></small>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Medicamento</button>
        <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
