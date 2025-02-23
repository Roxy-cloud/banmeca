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

    <form action="{{ route('medicamentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Seleccionar Categoria</option>
                @foreach ($categoria as $categoria)
                    <option value="{{ $insumo->id }}">{{ $categoria->Nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="insumo_id" class="form-label">Insumo</label>
            <select class="form-control" id="insumo_id" name="insumo_id" required>
                <option value="">Seleccionar Insumo</option>
                @foreach ($insumos as $insumo)
                    <option value="{{ $insumo->id }}">{{ $insumo->Nombre_Insumo }}</option>
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



        <div class="mb-3">
            <label for="Existencia" class="form-label">Existencia</label>
            <input type="text" class="form-control" id="Existencia" name="Existencia" required />
        </div>

         
        <!-- Botones -->
        <button type="submit" class="btn btn-primary">Guardar Medicamento</button>

        <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>
</div>
@endsection
