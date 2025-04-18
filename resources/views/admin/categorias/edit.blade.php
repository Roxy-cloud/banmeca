<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Editar Categoría: {{ $categoria->Nombre }}</h1>

   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif

   <!-- Formulario para editar la categoría -->
   <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
       @csrf 
       @method('PUT')

       <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Categoría</button>

       
       <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

   </form>

   ...
</div>

@endsection


=======
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Editar Medicamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul> 
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipment.update', $equipment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="benefactor_id" class="form-label">Benefactor</label>
            <select class="form-control" id="benefactor_id" name="benefactor_id" required>
                @foreach ($benefactors as $benefactor)
                    <option value="{{ $benefactor->id }}" {{ $equipment->benefactor_id == $benefactor->id ? 'selected' : '' }}>
                        {{ $benefactor->Tipo }}
                    </option>
                @endforeach
            </select>
        </div>

      
        <div class="mb-3">
            <label for="Tipo" class="form-label">Tipo de Equipo Médico</label>
            <input type="text" class="form-control" id="Tipo" name="Tipo" value="{{ $equipment->Tipo }}" required />
        </div>

        <div class="mb-3">
            <label for="Marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="Marca" name="Marca" value="{{ $equipment->Marca }}" required />
        </div>

        <div class="mb-3">
            <label for="Modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="Modelo" name="Modelo" value="{{ $equipment->Modelo }}" required />
        </div>

        <div class="mb-3">
            <label for="Modelo" class="form-label">Existencia</label>
            <input type="number" class="form-control" id="Existencia" name="Existencia" value="{{ $equipment->Existencia }}" required />
        </div>

        <div class="form-group">
            <label for="Estado">Estado</label>
            <select name="Estado" id="Estado" class="form-control" required>
                <option value="Bueno" {{ $equipment->Estado == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                <option value="Regular" {{ $equipment->Estado == 'Regular' ? 'selected' : '' }}>Regular</option>
                <option value="Malo" {{ $equipment->Estado == 'Malo' ? 'selected' : '' }}>Malo</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" />
            <small>Imagen actual: <img src="{{ asset('storage/' . $equipment->imagen) }}" width="100"></small>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('equipment.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
>>>>>>> e2a8b4e (Primer commit)
