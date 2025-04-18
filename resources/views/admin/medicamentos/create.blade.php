@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Medicamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<<<<<<< HEAD
    <form action="{{ route('medicamentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Seleccionar Categoria</option>
                @foreach ($categoria as $categoria)
                    <option value="{{ $insumo->id }}">{{ $categoria->Nombre }}</option>
=======
    <form action="{{ route('medicamentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Campo oculto para insumo_id -->
        <input type="hidden" name="insumo_id" value="1">

        <div class="mb-3">
            <label for="benefactor_id" class="form-label">Agregar un Benefactor</label>
            <select class="form-control" id="benefactor_id" name="benefactor_id" required>
                <option value="">Seleccionar</option>
                @foreach ($benefactors as $benefactor)
                    <option value="{{ $benefactor->id }}">{{ $benefactor->Nombre }}</option>
>>>>>>> e2a8b4e (Primer commit)
                @endforeach
            </select>
        </div>

        <div class="mb-3">
<<<<<<< HEAD
            <label for="insumo_id" class="form-label">Insumo</label>
            <select class="form-control" id="insumo_id" name="insumo_id" required>
                <option value="">Seleccionar Insumo</option>
                @foreach ($insumos as $insumo)
                    <option value="{{ $insumo->id }}">{{ $insumo->Nombre_Insumo }}</option>
=======
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Seleccionar Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->Nombre }}</option>
>>>>>>> e2a8b4e (Primer commit)
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre del Medicamento</label>
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

<<<<<<< HEAD


        <div class="mb-3">
            <label for="Existencia" class="form-label">Existencia</label>
            <input type="text" class="form-control" id="Existencia" name="Existencia" required />
        </div>

         
        <!-- Botones -->
        <button type="submit" class="btn btn-primary">Guardar Medicamento</button>

=======
        <div class="mb-3">
            <label for="Existencia" class="form-label">Existencia</label>
            <input type="number" class="form-control" id="Existencia" name="Existencia" required />
        </div>

        <div class="mb-3">
            <label for="Fecha_Vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="Fecha_Vencimiento" name="Fecha_Vencimiento" required />
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" />
        </div>

        <!-- Botones -->
        <button type="submit" class="btn btn-primary">Guardar Medicamento</button>
>>>>>>> e2a8b4e (Primer commit)
        <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection
